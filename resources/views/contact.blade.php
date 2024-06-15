<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h1>halaman kontak</h1>
    <div>
        <form action="/contact" method="post">
            <div>
                <label for="name">name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
            <label for="email">email</label>
            <input type="email" name="email" id="email" required>
        </div>
    </form>
</div>
</x-layout>