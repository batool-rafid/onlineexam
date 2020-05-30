<div class="form-group row">
                            <label for="material" class="col-md-4 col-form-label text-md-right">{{ __('material') }}</label>

                            <div class="col-md-6">
                                <input id="material" type="text" class="form-control @error('material') is-invalid @enderror" material="material" value="{{ old('material') }}" required autocomplete="material" autofocus>

                                @error('material')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>