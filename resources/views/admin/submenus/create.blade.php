<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menyu qo'shish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.submenus.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="menu">Menyu nomi</label>
                        <select name="menu_id" id="menu" class="form-control">
                                <option disabled selected>Menyuni tanlang</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name_uz}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Nomi Uz</label>
                        <input class="form-control" type="text" name="name_uz" required>
                    </div>
                    <div class="mb-3">
                        <label for="name">Nomi En</label>
                        <input class="form-control" type="text" name="name_en" required>
                    </div>
                    <div class="mb-3">
                        <label for="name">Nomi Ru</label>
                        <input class="form-control" type="text" name="name_ru" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>
