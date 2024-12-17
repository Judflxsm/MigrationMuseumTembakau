<!-- resources/views/admin/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">

        @include('admin.sidebar')

        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-gray-700">Selamat datang di Dashboard Admin</h1>
        </div>
    </div>
</body>
</html>
