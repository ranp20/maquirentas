<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Detalle de producto' }}</title>
  @vite(['resources/css/app.css', 'resources/css/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
  <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg w-full">
    <h1 class="text-2xl font-bold mb-4">{{ $item->brand }}</h1>
    <ul class="space-y-2 text-gray-700">
      <li><strong>SKU:</strong> {{ $item->sku }}</li>
      <li><strong>Categoría:</strong> {{ $item->category->name }}</li>
      <li><strong>Año:</strong> {{ $item->year }}</li>
      <li><strong>Capacidad:</strong> {{ $item->capacity }}</li>
      <li><strong>Precio FOB:</strong> ${{ $item->price_FOB }}</li>
      <li><strong>Precio CIF:</strong> ${{ $item->price_CIF }}</li>
    </ul>
    <a href="{{ url('/') }}" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Volver</a>
  </div>
</body>
</html>