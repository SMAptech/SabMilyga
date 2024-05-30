
<div class="container-fluid">

    <form action="{{ url('addProductPost') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="product_name" name="product_name" id="" class="form-control"><br>
        @error('product_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" placeholder="price"name="price" id="" class="form-control"><br>
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text"placeholder="descriptiom" name="description" id="" class="form-control"><br>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number"placeholder="quantity" name="quantity" id="" class="form-control"><br>
        @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" placeholder="categry"name="category" id="" class="form-control"><br>
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="file"placeholder="image" name="image" id="" class="form-control"><br>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Add Product">
    </form>
        
</div>

