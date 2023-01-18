@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.incidence.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.incidences.update", [$incidence->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <h5> Update Your details</h5>
                    <div class="form-group">
                        <label class="required" for="name">Your Name </label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $incidence->name) }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="required" for="phone">Your Phone Number</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="tel" name="phone" id="phone" value="{{ old('phone', $incidence->phone) }}" required>
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="required" for="lga">Local Government</label>
                        <select class="js-example-placeholder-multiple form-control " name="lga">
                            <option value="ANINRI">ANINRI</option>
                            <option value="AWGU">AWGU</option>
                            <option value="ENUGU EAST">ENUGU EAST</option>
                            <option value="ENUGU NORTH">ENUGU NORTH</option>
                            <option value="IGBO ETITI">IGBO ETITI</option>
                            <option value="ENUGU SOUTH">ENUGU SOUTH</option>
                            <option value="EZEAGU">EZEAGU</option>
                            <option value="IGBO EZE NORTH">IGBO EZE NORTH</option>
                            <option value="IGBO EZE SOUTH">IGBO EZE SOUTH</option>
                            <option value="ISI UZO">ISI UZO</option>
                            <option value="NKANU EAST">NKANU EAST</option>
                            <option value="NKANU WEST">NKANU WEST</option>
                            <option value="NSUKKA">NSUKKA</option>
                            <option value="OJI RIVER">OJI RIVER</option>
                            <option value="UDENU">UDENU</option>
                            <option value="UDI">UDI</option>
                            <option value="UZO-UWANI">UZO-UWANI</option>
                        </select>
                        @if($errors->has('lga'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lga') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label class="required" for="ward">Ward</label>
                        <input class="form-control {{ $errors->has('ward') ? 'is-invalid' : '' }}" type="text" name="ward" id="ward" value="{{ old('ward', $incidence->ward) }}" required>
                        @if($errors->has('ward'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ward') }}
                            </div>
                        @endif

                    </div>


                </div>
            <div class="div class col-md-8">
                <div class="div h5">
                    Update Report
                </div>
            <div class="form-group">
                <label class="required" for="subject">{{ trans('cruds.incidence.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', $incidence->subject) }}" required>
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.incidence.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observations">{{ trans('cruds.incidence.fields.observations') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('observations') ? 'is-invalid' : '' }}" name="observations" id="observations">{!! old('observations', $incidence->observations) !!}</textarea>
                @if($errors->has('observations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.incidence.fields.observations_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="images">{{ trans('cruds.incidence.fields.images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('images') ? 'is-invalid' : '' }}" id="images-dropzone">
                </div>
                @if($errors->has('images'))
                    <div class="invalid-feedback">
                        {{ $errors->first('images') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.incidence.fields.images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="videos">{{ trans('cruds.incidence.fields.videos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('videos') ? 'is-invalid' : '' }}" id="videos-dropzone">
                </div>
                @if($errors->has('videos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('videos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.incidence.fields.videos_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary" type="submit">
                    Update Report
                </button>
            </div>
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
                xhr.open('POST', '{{ route('admin.incidences.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $incidence->id ?? 0 }}');
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
    var uploadedImagesMap = {}
Dropzone.options.imagesDropzone = {
    url: '{{ route('admin.incidences.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImagesMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($incidence) && $incidence->images)
      var files = {!! json_encode($incidence->images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
        }
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
<script>
    var uploadedVideosMap = {}
Dropzone.options.videosDropzone = {
    url: '{{ route('admin.incidences.storeMedia') }}',
    maxFilesize: 2000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="videos[]" value="' + response.name + '">')
      uploadedVideosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedVideosMap[file.name]
      }
      $('form').find('input[name="videos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($incidence) && $incidence->videos)
          var files =
            {!! json_encode($incidence->videos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="videos[]" value="' + file.file_name + '">')
            }
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
