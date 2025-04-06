@extends('layouts.admin')
@section('content')
    <style>
        /* إزالة الهامش والحشو للمحتوى والنافبار */
        body, .container {
            margin: 0;
            padding: 0;
        }

        /* إذا كنت تحتاج لتقليل المسافة بين النافبار والمحتوى */
        .container {
            padding-top: 0 !important;
        }

        .navbar {
            margin-bottom: 0 !important; /* إزالة الهامش السفلي من النافبار */
        }
    </style>

    <div class="container">
        <!-- زر إضافة صنف جديد باللون الرمادي -->
        <a href="{{ url('categories/create') }}" class="btn btn-secondary mb-3">إضافة صنف جديد</a>

        <!-- الجدول لعرض الأصناف -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الصنف</th>
                    <th scope="col">الاحداث</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th> <!-- عرض الرقم الفريد للصنف -->
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ url('categories/delete/' . $category->id) }}" class="btn btn-danger">حذف</a>
                            <a href="{{ url('categories/edit/' . $category->id) }}" class="btn btn-info">تعديل</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="links">
            {{$categories->links()}}
        </div>
    </div>
@endsection
