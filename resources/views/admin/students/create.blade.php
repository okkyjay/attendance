@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.student.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.students.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="first_name">{{ trans('cruds.student.fields.first_name') }}</label>
                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.first_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="middle_name">{{ trans('cruds.student.fields.middle_name') }}</label>
                    <input class="form-control {{ $errors->has('middle_name') ? 'is-invalid' : '' }}" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', '') }}">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.middle_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="last_name">{{ trans('cruds.student.fields.last_name') }}</label>
                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.last_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.student.fields.gender') }}</label>
                    <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                        <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Student::GENDER_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('gender', 'male') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.gender_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="bio">{{ trans('cruds.student.fields.bio') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('bio') ? 'is-invalid' : '' }}" name="bio" id="bio">{!! old('bio') !!}</textarea>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.bio_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="school_name">{{ trans('cruds.student.fields.school_name') }}</label>
                    <input class="form-control {{ $errors->has('school_name') ? 'is-invalid' : '' }}" type="text" name="school_name" id="school_name" value="{{ old('school_name', '') }}">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.school_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="school_address">{{ trans('cruds.student.fields.school_address') }}</label>
                    <input class="form-control {{ $errors->has('school_address') ? 'is-invalid' : '' }}" type="text" name="school_address" id="school_address" value="{{ old('school_address', '') }}">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.school_address_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="class">{{ trans('cruds.student.fields.class') }}</label>
                    <input class="form-control {{ $errors->has('class') ? 'is-invalid' : '' }}" type="text" name="class" id="class" value="{{ old('class', '') }}">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.class_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="phone_number">{{ trans('cruds.student.fields.phone_number') }}</label>
                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.phone_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="photo">{{ trans('cruds.student.fields.photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                    </div>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.photo_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="parent_id">{{ trans('cruds.student.fields.parent') }}</label>
                    <select class="form-control select2 {{ $errors->has('parent') ? 'is-invalid' : '' }}" name="parent_id" id="parent_id" required>
                        @foreach($parents as $id => $parent)
                            <option value="{{ $id }}" {{ old('parent_id') == $id ? 'selected' : '' }}>{{ $parent }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.student.fields.parent_helper') }}</span>
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
                                        xhr.open('POST', '/admin/students/ckmedia', true);
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
                                        data.append('crud_id', {{ $student->id ?? 0 }});
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

    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.students.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                        @if(isset($student) && $student->photo)
                var file = {!! json_encode($student->photo) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $student->photo->getUrl('thumb') }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
