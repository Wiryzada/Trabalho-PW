@extends('layouts.student')

@section('page-title', 'Solicitar Carteirinha')

@section('content')
<h1>Solicitar Carteirinha</h1>

<form action="{{ route('student-voucher.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nome Completo</label>
        <input type="text" name="name" id="name">
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email">
        @error('email')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password">Senha</label>
        <input type="password" name="password" id="password">
        @error('password')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf">
        @error('cpf')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="birth_date">Data de Nascimento</label>
        <input type="date" name="birth_date" id="birth_date">
        @error('birth_date')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="enrollment">Matrícula</label>
        <input type="text" name="enrollment" id="enrollment">
        @error('enrollment')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="institution_id">Instituição</label>
        <select name="institution_id" id="institution_id">
            <option value="" disabled selected>Selecione uma instituição</option>
            @foreach ($institutions as $institution)
            <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </select>
        @error('institution_id')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div id="courses">
        <label for="course_id">Curso</label>
        <select name="course_id" id="course_id" disabled>
            <option value="" disabled selected>Selecione um curso</option>
        </select>
        @error('course_id')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#institution_id').change(function () {
                var institutionId = $(this).val();
                if (institutionId) {
                    $.ajax({
                        type: "GET",
                        url: '/institution/' + institutionId + '/courses',
                        success: function (res) {
                            if (res) {
                                $('#course_id').empty();
                                $('#course_id').prop('disabled', false);
                                $('#course_id').append('<option value="" disabled selected>Selecione um curso</option>');
                                $.each(res, function (key, value) {
                                    $('#course_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                                $('#course_id').trigger('change');
                            } else {
                                $('#course_id').empty();
                                $('#course_id').prop('disabled', true);
                            }
                        }
                    });
                } else {
                    $('#course_id').empty();
                    $('#course_id').prop('disabled',);
                }
            });
        });
    </script>

    <div>
        <button type="submit">Solicitar Carteirinha</button>
    </div>
</form>
@endsection