<form class="mb-3" method="POST" action="{{ route('book.admin.contacts') }}">
    @csrf

    <div class="form-group mb-2">
        <h2 class=" pb-3 text-danger">Поиск по:</h2>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="name" name="fields[]" value="name"
                checked>
            <label class="form-check-label" for="name">Ф.И.О.</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="phone" name="fields[]" value="phone">
            <label class="form-check-label" for="phone">Номер телефона</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="email" name="fields[]" value="email">
            <label class="form-check-label" for="email">Email</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="author" name="fields[]" value="author">
            <label class="form-check-label" for="author">Автор</label>
        </div>
    </div>

    <div class="form-group mb-1">
        <label class="mb-1" for="searchText">Текст поиска:</label>
        <input type="text" class="form-control" id="searchText" name="searchText" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Найти</button>
</form>