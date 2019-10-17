<select id="selectUniversity" class="form-control chosen-select">
    @if(sizeof($universities)>0)
        @if(isset($universityName))
            @foreach($universities as $university)
                @if(strtolower($university->acronym) == $universityName)
                    <option value="{{ $university->id }}-{{ $university->acronym }}" selected>
                        {{ $university->name }}
                        ({{ $university->acronym }})
                    </option>
                @else
                    <option value="{{ $university->id }}-{{ $university->acronym }}">
                        {{ $university->name }}
                        ({{ $university->acronym }})
                    </option>
                @endif
            @endforeach
        @else
            <option value="" disabled selected>--Seleccione universidad</option>
            @foreach($universities as $university)
                <option value="{{ $university->id }}-{{ $university->acronym }}">
                    {{ $university->name }}
                    ({{ $university->acronym }})
                </option>
            @endforeach
        @endif
    @endif
</select>
