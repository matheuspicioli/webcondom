<div class="checkbox">
	<label for="{{ $id }}">
		<input type="checkbox" name="{{ $nome }}" value="{{ $valor ?? null }}" id="{{ $id }}" {{ old($nome) == $valor ? 'checked' : '' }} {{ $atributos ?? null }} />
			{{ $texto }}
	</label>
</div>