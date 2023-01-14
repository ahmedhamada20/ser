<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافه جديده</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store_question')}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label>الاسم</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <br>


                    <div class="row">
                        <div class="col">
                            <label>نوع السوال</label>
                            <select class="form-control" name="type_id" required>
                                <option value="" disabled selected>-- اختر من القائمه --</option>
                                @foreach(App\Models\Type::all() as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col">
                            <label>نوع السوال</label>
                            <select class="form-control" name="quizzes_id" required>
                                <option value="" disabled selected>-- اختر من القائمه --</option>
                                @foreach(App\Models\Quizze::all() as $quizze)
                                    <option value="{{$quizze->id}}">{{$quizze->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
