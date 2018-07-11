@extends('mage2-ecommerce::admin.layouts.app')

@section('content')
    <div class="box">
        <div class="box-header">
            <h2>
                <i class="fa fa-list-ul"></i>
                <span class="main-title-wrap">Список категорий пользователя <b>"{{ $user->first_name }}"</b></span>
            </h2>


        </div>
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Категория</th>
                    <th>Скидка %</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $co => $category)
                        <tr>
                            <td>{{ $co + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <input type="number" step="0.1" min="0" class="js_change_discount_user form-control" style="width: 80px" data-user_id="{{ $user->id }}" value="{{ $category->pivot->discount }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection