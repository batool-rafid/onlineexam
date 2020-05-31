
                        <div class="form-group row">
                            <label for="questions" class="col-md-4 col-form-label text-md-right">{{ __('questions') }}</label>

                            <div class="col-md-6">
                                <input id="questions" name="questions" type="text" class="form-control @error('questions') is-invalid @enderror" questions="questions" value="{{ old('questions') }}" required autocomplete="questions" autofocus>

                                @error('questions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>