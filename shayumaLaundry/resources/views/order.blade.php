<h2>Order Laundry</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST">
@csrf
<select name="layanan">
    <option>Cuci Kering</option>
    <option>Cuci Setrika</option>
</select><br>

<input type="number" name="berat" placeholder="Berat (kg)"><br>
<button type="submit">Order</button>
</form>

<a href="/logout">Logout</a>
