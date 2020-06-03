<div class="form-group row">
                            <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Exam question') }}</label>

                            <div class="col-md-6">
                                <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" value="{{$question->question}}" required autocomplete="question" autofocus>

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>