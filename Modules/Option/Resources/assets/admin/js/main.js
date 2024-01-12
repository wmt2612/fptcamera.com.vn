import Option from './Option';
import ProductOption from './ProductOption';
import ServiceOption from './ServiceOption';

if ($('#option-create-form, #option-edit-form').length !== 0) {
    new Option();
}

if ($('#product-create-form, #product-edit-form').length !== 0) {
    new ProductOption();
}

if ($('#service-create-form, #service-edit-form').length !== 0) {
    new ServiceOption();
}

