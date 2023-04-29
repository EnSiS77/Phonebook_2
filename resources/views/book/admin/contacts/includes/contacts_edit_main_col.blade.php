@php
    /** @var \App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <h2 class="text-center pb-3 text-danger">Страница изменения контактов</h2>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#maindata" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Основные данные</button>
                    </li>
                  </ul>

                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                    <div class="form-group mb-2">
                        <label for="name">Ф.И.О.</label>
                        <input type="text" name="name" id="name" value="{{ $item->name }}" class="form-control" minlength="3" required>
                    </div>
                    
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ $item->email }}" class="form-control" minlength="3" required>
                    </div>
                    
                    <div class="form-group mb-2">
                        <label for="phone">Номер телефона</label>
                        <input type="tel" name="phone" id="phone" value="{{ $item->phone }}" class="form-control" minlength="3" required>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>