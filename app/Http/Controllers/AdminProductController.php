<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $attr;
    private $variantSizes;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->attr = [
            ['value' => '', 'name' => 'none'],
            ['value' => 'top', 'name' => 'top'],
            ['value' => 'new', 'name' => 'new'],
            ['value' => 'sale', 'name' => 'sale'],
        ];
        $this->variantSizes = ["S", "M", "L", "XL"];
    }

    public function index()
    {
        $allProducts = Product::with('variants.images')->get()->toArray();
        return view('pages.admin.products', compact("allProducts"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributes = $this->attr;
        $variantSizes = $this->variantSizes;
        $allCategories = Category::all()->toArray();

        return view('pages.admin.productCreate', compact('attributes', 'variantSizes', 'allCategories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->except(['_token']));

        \Helper::ArrayToCsv($request->except(['_token', 'variants']));
        dd();

        $req = $request->except(['_token', 'new_variant']);
        $new_variant = $request->get('new_variant');
        $res = Product::create($req);
        if (isset($new_variant) && isset($res['id'])) {
            foreach ($new_variant as $v_id => $variant) {
                $variant['product_id'] = $res['id'];

                $res2 = ProductVariant::create($variant);
            }
        }
        return redirect(route('admin.products'))->with('success', 'Product Created successfully');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $attributes = $this->attr;
        $productDetail = Product::with('variants.images')->where('id', $id)->first();
        if (is_null($productDetail)) {
            abort(404);
        }
        $allCategories = Category::all()->toArray();
        $variantSizes = $this->variantSizes;

        return view('pages.admin.productEdit', ['productDetail' => $productDetail->toArray(), 'id' => $id, 'attributes' => $attributes, 'allCategories' => $allCategories, 'variantSizes' => $variantSizes, 'edit' => false]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Category $category, $id)
    {
        //
        $attributes = $this->attr;
        $variantSizes = $this->variantSizes;
        $productDetail = Product::with('variants.images')->where('id', $id)->first();
        $allCategories = Category::all()->toArray();
        $edit = true;
        if (is_null($productDetail)) {
            abort(404);
        }
        return view('pages.admin.productEdit', compact('productDetail', 'id', 'allCategories', 'attributes', 'variantSizes', 'edit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {

        $req = $request->except(['_token', 'variants', 'new_variant']);
        $variants = $request->get('variants');
        $new_variant = $request->get('new_variant');
        $res = Product::where('id', $id)->update($req);
        foreach ($variants as $v_id => $variant) {
            $res = ProductVariant::where('id', $v_id)->update(Arr::except($variant, ['id']));
        }
        if (isset($new_variant)) {
            foreach ($new_variant as $v_id => $variant) {
                $res = ProductVariant::create($variant);
            }
        }
        return redirect(route('admin.productedit', $id))->with('success', 'Product updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $res = Product::destroy($id);
        if ($res) {
            return redirect(route('admin.products'))->with('success', 'Product deleted successfully');
        } else {
            return redirect(route('admin.products'))->with('error', 'Error while deleting product');
        }
        //
    }

    public function destroyVariant(ProductVariant $productvariant, $id)
    {
        try {
            $res = ProductVariant::destroy($id);
            return ["success" => !!$res, "error" => !$res, 'data' => ['message' => 'Successfully Deleted Variant: ' . $id]];
        } catch (\Exception $e) {
            $res = false;
            return ["success" => !!$res, "error" => !$res, 'data' => ['message' => 'Error Deleting Variant: ' . $id]];


        }

        //
    }

    public function uploadCsv(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'file' => 'required',
            ]);

            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $allowedFileExtension = ['csv'];
                $errorFileNames = "";

                $extension = $file->getClientOriginalExtension();
                $imageExtensionCheck = in_array($extension, $allowedFileExtension);

                if ($imageExtensionCheck) {
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $new_name = $filename . time() . '.' . $extension;
                    if (!file_exists("csv/uploads")) {
                        mkdir('csv/uploads', 0755, true);
                    }
                    $filePath = $file->move(public_path('csv/uploads/'), $new_name);
                    $csvArr = \Helper::csvToArray($filePath);
                    $translatedArr = $this->translateCsvArray($csvArr);
                    echo "<pre>";
                    print_r($translatedArr);
                    echo "</pre>";
                    foreach ($translatedArr as $item) {
                        $this->creatProduct($item);
                    }
                } else {
                    if (empty($errorFileNames)) {
                        $errorFileNames = $file->getClientOriginalName();
                    } else {
                        $errorFileNames = $errorFileNames . "," . $file->getClientOriginalName();
                    }
                }

                if (!empty($errorFileNames)) {
                    $output = array(
                        'success' => false,
                        'error' => true,
                        'message' => $errorFileNames . ' these file have wrong extension'
                    );
                } else {
                    $output = array(
                        'image' => '$imageData',
                        'success' => true,
                        'error' => false,
                        'message' => 'file uploaded successfully. ',
                    );
                }
                return response()->json($output);

            }

        }
        return view('pages.admin.uploadCsv');
    }

    public function translateCsvArray($originalArray)
    {
        $resultArray = [];

        foreach ($originalArray as $item) {
            $sku = $item['SKU'];

            // If SKU exists in the result array, add to the 'new_variant' sub-array
            if (isset($resultArray[$sku])) {
                $variant = [
                    'color' => $item['new_variant-color'],
                    'size' => $item['new_variant-size'],
                    'stock_quantity' => $item['new_variant-stock_quantity'],
                    'images' => $item['new_variant-images'],
                ];

                $resultArray[$sku]['new_variant'][] = $variant;
            } else {
                // If SKU doesn't exist, create a new entry in the result array
                $resultArray[$sku] = [
                    'name' => $item['name'],
                    'SKU' => $item['SKU'],
                    'fabric' => $item['fabric'],
                    'price' => $item['price'],
                    'old_price' => $item['old_price'],
                    'attribute' => $item['attribute'],
                    'weight' => $item['weight'],
                    'detail' => $item['detail'],
                    'description' => $item['description'],
                    'category_id' => $item['category_id'],
                    'new_variant' => [
                        [
                            'color' => $item['new_variant-color'],
                            'size' => $item['new_variant-size'],
                            'stock_quantity' => $item['new_variant-stock_quantity'],
                            'images' => $item['new_variant-images'],
                        ],
                    ],
                ];
            }
        }

        // Remove the SKU index and convert to indexed array
        $resultArray = array_values($resultArray);
        return $resultArray;
    }

    function creatProduct($prod)
    {
        $Product = $prod;
        unset($Product['new_variant']);

        $new_variant = $prod['new_variant'];
        $res = Product::create($Product);
        $image = [];
        $success = false;
        if (isset($new_variant) && isset($res['id'])) {
            foreach ($new_variant as $v_id => $variantArr) {
                $variant = $variantArr;
                unset($variant['images']);
                $variant['product_id'] = $res['id'];
                $res2 = ProductVariant::create($variant);
                $image[$res2['id']] = $variantArr['images'];
            }
            foreach ($image as $variantId => $images) {
                $imgNameArr = explode(',', $images);
                echo "<pre>";
                print_r($imgNameArr);
                echo "</pre>";
                foreach ($imgNameArr as $imageName) {
                    $newImagePath = $this->moveImageToNewDirectory($imageName);
                    echo nl2br($newImagePath.__LINE__.'\n');
                    if ($newImagePath !== null) {
                        $data['product_variant_id'] = $variantId;
                        $data['image_path'] = $newImagePath;
                        echo "<pre>";
                        print_r($data);
                        echo "</pre>";
                        $imageData = ProductImage::create($data);
                        echo "<pre>";
                        print_r($imageData);
                        echo "</pre>";
                        if (isset($imageData['id'])) {
                            $success = true;
                        }

//                        finish
                    } else {
//                        echo "Failed to move the image.";
                    }

                }

            }
        }
        return $success;

    }

    function moveImageToNewDirectory($imageName)
    {
        $sourceDirectory = public_path('img/CsvUploadImages/');
        $destinationDirectory = public_path('img/product/images/');

        $sourcePath = $sourceDirectory . $imageName;

        // Check if the file exists in the source directory
        if (!file_exists("img/product/images")) {
            mkdir('img/product/images', 0755, true);
        }
        if (file_exists($sourcePath)) {
            // Generate a new file name by adding time()
            $newFileName = time() . $imageName;

            // Create the full path for the destination
            $destinationPath = $destinationDirectory . $newFileName;

            // Move the file to the new directory
            if (rename($sourcePath, $destinationPath)) {
                // File moved successfully, return the new file name
                return 'img/product/images/'.$newFileName;
            } else {
                // Failed to move the file
                return null;
            }
        } else {
            // File does not exist in the source directory
            return null;
        }
    }
}

