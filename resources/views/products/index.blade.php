
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <main>

        @include('includes.info-box')


        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Загрузите файл test.xlsx</span>
                    <span class="badge bg-primary rounded-pill">3</span>
                </h4>



                <form method="post" action="{{ route('products.store') }}"  class="card p-2" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="file" class="form-control" class="@error('title') is-invalid @enderror placeholder="Excell file" name="file"> <!-- Added name attribute for the file input -->
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-secondary">Отправить</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <h1 class="mb-3">Товары</h1>
                @if( isset($products) && count($products) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Заголовок</th>
                            <th>Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td>{{ $item->excell_id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->date }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($products->hasPages())
                        {{ $products->links() }}
                    @endif

                @else
                    <h3>Товаров нет.</h3>
                    <h5>Выполните в терминале</h5>
                    <p>$ php artisan migrate:fresh --seed</p>
                    <p>$ php artisan cache:clear</p>
                    <p>$ php artisan queue:work</p>
                    <p>Загрузите файл с продуктами</p>

                @endif


            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">

        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
