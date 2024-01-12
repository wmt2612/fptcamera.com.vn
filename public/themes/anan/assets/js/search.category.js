let queryParams = {
    sort: "latest",
};

function fetchProducts() {
    getSort();
    getPrice();
    const category = $("#category").val();
    const searchParams = window.location.search;
    const urlParams = new URLSearchParams(searchParams);
    const entries = urlParams.entries();
    let params = [];
    for (const entry of entries) {
        if (
            entry[0] !== "sort" &&
            entry[0] !== "toPrice" &&
            entry[0] !== "fromPrice"
        ) {
            queryParams[entry[0]] = entry[1];
        }
    }
    var url =
        route("product.category", { slug: category }) +
        "?" +
        $.param(queryParams);
    window.location = url;
}

function getSort() {
    queryParams.sort = $("#sort").val();
}

$(".filter_sort li a").click(function () {
    const sort = $(this).data("value");
    if (sort != $("#sort").val()) {
        $("#sort").val(sort);
        fetchProducts();
    }
});

function getPrice() {
    const checkbox = $(".az-filter-price .filter-checkbox:checked");
    if (checkbox) {
        const fromPrice = checkbox.data("min_price");
        const toPrice = checkbox.data("max_price");
        if (fromPrice) {
            queryParams.fromPrice = fromPrice;
        }
        if (toPrice) {
            queryParams.toPrice = toPrice;
        }
    }
}

$(".az-filter-price .filter-checkbox").on("change", function () {
    $(".az-filter-price .filter-checkbox").prop("checked", false);
    $(this).prop("checked", true);
    fetchProducts();
});
