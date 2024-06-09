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
            <h2 class="mt-5">Transaksi Baru :</h2>
            <form
                class="mt-5"
                action="{{ route('transaction.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="form-group mb-3">
                    <label for="transaction_name">Nama Transaksi : </label>
                    <input
                        type="text"
                        class="form-control @error('transaction_name') is-invalid @enderror"
                        id="transaction_name"
                        name="transaction_name"
                        placeholder="Masukkan Transaksi"
                        value="{{ old('transaction_name') }}"
                    />
                    @error('transaction_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="income_or_expenditure"
                        >Pemasukan atau Pengeluaran :
                    </label>
                    <select
                        class="form-control @error('income_or_expenditure') is-invalid @enderror"
                        id="income_or_expenditure"
                        name="income_or_expenditure"
                    >
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="price">Nominal : </label>
                    <input
                        type="number"
                        class="form-control @error('price') is-invalid @enderror"
                        id="price"
                        name="price"
                        placeholder="Masukkan Nominal"
                        value="{{ old('price') }}"
                    />
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="form-label"
                        >Bukti Transaksi :
                    </label>
                    <input
                        class="form-control @error('image') is-invalid @enderror"
                        type="file"
                        id="image"
                        name="image"
                    />
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">
                    Submit
                </button>
            </form>
        </div>
    </body>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>
</html>
