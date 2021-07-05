@extends('layouts.default')

@section('content')
<h1>Products</h1>

<div class='row justify-content-end'>
    <button id="create-product" type="button" class="btn btn-primary col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-xxl-2">Create Product</button>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Brand</th>
            <th scope="col">Price</th>
            <th scope="col">Qntd</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <!--
        <tr>
            <td>1</td>
            <td>Name</td>
            <td>Description</td>
            <td>Brand</td>
            <td>Price</td>
            <td>Qntd</td>
            <td>Created At</td>
            <td>Updated At</td>
            <td>
                <div class="btn-group" role="group" aria-label="Actions">
                    <button type="button" class="btn btn-success" title="edit"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-danger" title="delete"><i class="bi bi-trash-fill"></i></button>
                </div>
            </td>
        </tr>
        -->
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="product-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Product: <span id="product-modal-name">...</span></h5>
            </div>
            <div class="modal-body">
                <form id="product-modal-form" class="needs-validation" novalidate>
                    <input type="hidden" id="productId" value="0" />
                    <div class="mb-3">
                        <label for="productNameInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="productNameInput" placeholder="Product name" min-length="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescriptionInput" class="form-label">Description</label>
                        <textarea class="form-control" id="productDescriptionInput" rows="3" min-length="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productBrandInput" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="productBrandInput" placeholder="Product brand" min-length="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="productPriceInput" class="form-label">Price</label>
                        <input type="text" class="form-control" id="productPriceInput" placeholder="Product price" required>
                    </div>
                    <div class="mb-3">
                        <label for="productQntdInput" class="form-label">Quantity</label>
                        <input
                            type="number"
                            class="form-control"
                            id="productQntdInput"
                            min="1"
                            step="1"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                            placeholder="Product quantity"
                            required
                        >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="product-modal-form-submit">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
(function() {
    let createProduct = (name, description, brand, price, quantity) => {
        $.ajax({
            dataType: 'json',
            url: `/api/products`,
            method: 'POST',
            data: {
                name,
                description,
                brand,
                price,
                quantity
            },
            success: (data) => {
                getProducts()
                alert('Product registered successfully!')
            },
            error: (xhr, status) => {
                alert('An error ocurred')
            }
        })
    }
    let updateProduct = (id, name, description, brand, price, quantity) => {
        $.ajax({
            dataType: 'json',
            url: `/api/products/${id}`,
            method: 'PUT',
            data: {
                name,
                description,
                brand,
                price,
                quantity
            },
            success: (data) => {
                getProducts()
                alert('Product updated successfully!')
            },
            error: (xhr, status) => {
                alert('An error ocurred')
            }
        })
    }
    let deleteProduct = (id) => {
        $.ajax({
            dataType: 'json',
            url: `/api/products/${id}`,
            method: 'DELETE',
            success: (data) => {
                getProducts()
                alert('Product deleted successfully!')
            },
            error: (xhr, status) => {
                alert('An error ocurred')
            }
        })
    }

    let productModal = new bootstrap.Modal(document.getElementById('product-modal'), {})
    $('#productPriceInput').mask('000000000000000.00', {reverse: true})
    $('#product-modal-form').submit((event) => {
        let form = event.currentTarget

        form.classList.add('was-validated')

        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            return true
        }

        let id = $("#productId").val()
        let name = $("#productNameInput").val()
        let description = $("#productDescriptionInput").val()
        let brand = $("#productBrandInput").val()
        let price = $("#productPriceInput").val()
        let quantity = $("#productQntdInput").val()

        if (id == 0) {
            return createProduct(name, description, brand, price, quantity)
        }

        return updateProduct(id, name, description, brand, price, quantity)
    })
    $('#product-modal-form-submit').click((event) => {
        $('#product-modal-form').submit()
    })
    let clearProductForm = () => {
        $("#product-modal-name").html('')
        $("#productId").val(0)
        $("#productNameInput").val('')
        $("#productDescriptionInput").val('')
        $("#productBrandInput").val('')
        $("#productPriceInput").val('')
        $("#productQntdInput").val('')
    }
    $('#create-product').click((event) => {
        clearProductForm()
        productModal.show()
    })


    let getRow = (id, name, description, brand, price, qntd, created_at, updated_at) => `
            <tr>
                <td>${id}</td>
                <td>${name}</td>
                <td>${description}</td>
                <td>${brand}</td>
                <td>${price}</td>
                <td>${qntd}</td>
                <td>${created_at}</td>
                <td>${updated_at}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Actions">
                        <a class="action-edit btn btn-success" title="edit" data-id="${id}"><i class="bi bi-pencil-square"></i></a>
                        <a class="action-delete btn btn-danger" title="delete" data-id="${id}"><i class="bi bi-trash-fill"></i></a>
                    </div>
                </td>
            </tr>
    `
    let setEdit = () => {
        $('#table-body .action-edit').click((event) => {
            let id = event.currentTarget.dataset.id
            getProduct(id)
        })
    }
    let setDelete = () => {
        $('#table-body .action-delete').click((event) => {
            let id = event.currentTarget.dataset.id
            if (window.confirm("Confirm product deletion ?")) {
                deleteProduct(id)
            }
        })
    }
    let getProduct = (id) => {
        $.ajax({
            dataType: 'json',
            url: `/api/products/${id}`,
            success: (data) => {
                let product = data.data
                $("#product-modal-name").html(product.id)
                $("#productId").val(product.id)
                $("#productNameInput").val(product.name)
                $("#productDescriptionInput").val(product.description)
                $("#productBrandInput").val(product.brand)
                $("#productPriceInput").val(product.price)
                $("#productQntdInput").val(product.quantity)
                productModal.show()
            }
        })
    }
    let getProducts = () => {
        $.ajax({
            dataType: 'json',
            url: '/api/products',
            success: (data) => {
                let rows = []
                $.each(data.data, (key, record) => {
                    rows.push(getRow(
                        record.id,
                        record.name,
                        record.description,
                        record.brand,
                        record.price,
                        record.quantity,
                        record.created_at,
                        record.updated_at
                    ))
                })
                $('#table-body').html(rows.join(''))
                setEdit()
                setDelete()
            }
        })
    }
    getProducts()
})();
</script>
@endsection
