<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>App Transaction History</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <div class="container">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row justify-content-between mt-5">
                <div class="col-7">
                    <a href="/transaction/create">
                        <button type="button" class="btn btn-success">
                            Tambah Transaksi
                        </button>
                    </a> 
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary">
                        Saldo Rp. {{ number_format($totalKeuangan, 0, ',', '.') }}
                    </button>   
                </div>
                <div class="col-2">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>   
                    </form>
                </div>
            </div>
            <table
                class="table table-secondary table-striped-columns table-hover mt-3"
            >
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Transaksi</th>
                        <th scope="col">Pemasukan atau Pengeluaran</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Bukti Transaksi</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaction->transaction_name }}</td>
                        <td>{{ $transaction->income_or_expenditure }}</td>
                        <td>Rp. {{ number_format($transaction->price, 0, ',', '.') }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td><a href="{{ asset($transaction->image) }}" target="_blank">View</a></td>
                        <td>
                            <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Hapus
                                </button>   
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>
</html>
