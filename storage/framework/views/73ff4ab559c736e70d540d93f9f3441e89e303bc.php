<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.student.title_singular')); ?>

        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route("admin.students.store")); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="required" for="first_name"><?php echo e(trans('cruds.student.fields.first_name')); ?></label>
                    <input class="form-control <?php echo e($errors->has('first_name') ? 'is-invalid' : ''); ?>" type="text" name="first_name" id="first_name" value="<?php echo e(old('first_name', '')); ?>" required>
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.first_name_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label for="middle_name"><?php echo e(trans('cruds.student.fields.middle_name')); ?></label>
                    <input class="form-control <?php echo e($errors->has('middle_name') ? 'is-invalid' : ''); ?>" type="text" name="middle_name" id="middle_name" value="<?php echo e(old('middle_name', '')); ?>">
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.middle_name_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label class="required" for="last_name"><?php echo e(trans('cruds.student.fields.last_name')); ?></label>
                    <input class="form-control <?php echo e($errors->has('last_name') ? 'is-invalid' : ''); ?>" type="text" name="last_name" id="last_name" value="<?php echo e(old('last_name', '')); ?>" required>
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.last_name_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label class="required"><?php echo e(trans('cruds.student.fields.gender')); ?></label>
                    <select class="form-control <?php echo e($errors->has('gender') ? 'is-invalid' : ''); ?>" name="gender" id="gender" required>
                        <option value disabled <?php echo e(old('gender', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                        <?php $__currentLoopData = App\Student::GENDER_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?php echo e(old('gender', 'male') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.gender_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label for="bio"><?php echo e(trans('cruds.student.fields.bio')); ?></label>
                    <textarea class="form-control ckeditor <?php echo e($errors->has('bio') ? 'is-invalid' : ''); ?>" name="bio" id="bio"><?php echo old('bio'); ?></textarea>
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.bio_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label for="school_name"><?php echo e(trans('cruds.student.fields.school_name')); ?></label>
                    <input class="form-control <?php echo e($errors->has('school_name') ? 'is-invalid' : ''); ?>" type="text" name="school_name" id="school_name" value="<?php echo e(old('school_name', '')); ?>">
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.school_name_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label for="school_address"><?php echo e(trans('cruds.student.fields.school_address')); ?></label>
                    <input class="form-control <?php echo e($errors->has('school_address') ? 'is-invalid' : ''); ?>" type="text" name="school_address" id="school_address" value="<?php echo e(old('school_address', '')); ?>">
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.school_address_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label for="class"><?php echo e(trans('cruds.student.fields.class')); ?></label>
                    <input class="form-control <?php echo e($errors->has('class') ? 'is-invalid' : ''); ?>" type="text" name="class" id="class" value="<?php echo e(old('class', '')); ?>">
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.class_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label for="phone_number"><?php echo e(trans('cruds.student.fields.phone_number')); ?></label>
                    <input class="form-control <?php echo e($errors->has('phone_number') ? 'is-invalid' : ''); ?>" type="text" name="phone_number" id="phone_number" value="<?php echo e(old('phone_number', '')); ?>">
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.phone_number_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label for="photo"><?php echo e(trans('cruds.student.fields.photo')); ?></label>
                    <div class="needsclick dropzone <?php echo e($errors->has('photo') ? 'is-invalid' : ''); ?>" id="photo-dropzone">
                    </div>
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.photo_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label class="required" for="parent_id"><?php echo e(trans('cruds.student.fields.parent')); ?></label>
                    <select class="form-control select2 <?php echo e($errors->has('parent') ? 'is-invalid' : ''); ?>" name="parent_id" id="parent_id" required>
                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" <?php echo e(old('parent_id') == $id ? 'selected' : ''); ?>><?php echo e($parent); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('')); ?>

                        </div>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.student.fields.parent_helper')); ?></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        <?php echo e(trans('global.save')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
                                        data.append('crud_id', <?php echo e($student->id ?? 0); ?>);
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
            url: '<?php echo e(route('admin.students.storeMedia')); ?>',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
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
                        <?php if(isset($student) && $student->photo): ?>
                var file = <?php echo json_encode($student->photo); ?>

                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '<?php echo e($student->photo->getUrl('thumb')); ?>')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\OKE AYODEJI\Desktop\attendance\resources\views/admin/students/create.blade.php ENDPATH**/ ?>