<label for="{{ $id }}" class="control-label">{{ $texto }}</label>
<input type="text" class="form-control {{ $classes ?? null }}" name="{{ $nome }}"
	   value="{{ $valor ?? null }}" id="{{ $id }}" tabindex="{{ $tabindex }}" {{ $atributos ?? null }} />