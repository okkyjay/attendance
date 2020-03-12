@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.guardian.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.guardians.update", [$guardian->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required">{{ trans('cruds.guardian.fields.title') }}</label>
                    <select class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" required>
                        <option value disabled {{ old('title', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Guardian::TITLE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('title', $guardian->title) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.guardian.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="surname">{{ trans('cruds.guardian.fields.surname') }}</label>
                    <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" name="surname" id="surname" value="{{ old('surname', $guardian->surname) }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.guardian.fields.surname_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="initials">{{ trans('cruds.guardian.fields.initials') }}</label>
                    <input class="form-control {{ $errors->has('initials') ? 'is-invalid' : '' }}" type="text" name="initials" id="initials" value="{{ old('initials', $guardian->initials) }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.guardian.fields.initials_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.guardian.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $guardian->email) }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.guardian.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="phone_number">{{ trans('cruds.guardian.fields.phone_number') }}</label>
                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $guardian->phone_number) }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.guardian.fields.phone_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.guardian.fields.address') }}</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $guardian->address) }}</textarea>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.guardian.fields.address_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="bio">{{ trans('cruds.guardian.fields.bio') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('bio') ? 'is-invalid' : '' }}" name="bio" id="bio">{!! old('bio', $guardian->bio) !!}</textarea>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.guardian.fields.bio_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/admin/guardians/ckmedia', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() { reject(genericErrorText) });
                                        xhr.addEventListener('abort', function() { reject() });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', {{ $guardian->id ?? 0 }});
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

@endsection
