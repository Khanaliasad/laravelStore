// Save variantId to local storage
function saveSelectedVariant(variantId) {
    variantId = JSON.stringify(variantId)
    localStorage.setItem('selectedVariant', variantId);
}

// Retrieve variantId from local storage
function getSelectedVariant() {
    return JSON.parse(localStorage.getItem('selectedVariant'));
}

// Example: Save selected variantId when handling the size click
function handleSizeClick(element, variantId) {
    // Your existing click handling logic

    // Save the variantId to local storage
    saveSelectedVariant(variantId);
}

// Example: Retrieve and use the selected variantId
function useSelectedVariant() {
    // Retrieve the selected variantId from local storage
    var selectedVariant = getSelectedVariant();

    // Use the selected variantId as needed
    console.log('Selected Variant ID:', selectedVariant);
}
