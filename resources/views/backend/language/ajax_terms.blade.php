@php
    $i = 0;
@endphp

@foreach ($data['terms'] as $key => $value)
    <tr>
        <td data-title="#">{{ ++$i }}</td>
        <td data-title="phrase">{{ $key }}</td>
        <td data-title="translated_language">
            <input type="text" class="form-control form--control" name="{{ $key }}"
                value="{{ $value }}" />
        </td>
    </tr>
@endforeach
