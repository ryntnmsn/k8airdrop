<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

    <title>Document</title>
</head>
<body>


    <select style="width:100%" id="platforms_select" multiple='multiple'>
        <option value="apple">Apple</option>
        <option value="samsung">Samsung</option>
        <option value="iphone">Iphone</option>
       
    </select>


    <script>
        $(document).ready(function() {
            $('#platforms_select').select2();
            $('#platforms_select').on('change', function() {
                let $data = $($this).val();
                console.log($data);
                // $wire.set('platforms', $data);
            });
        });
    </script>


    {{-- <div>
        <div wire:ignore>
            <textarea id="editor" wire:model="document"></textarea>
        </div>
        <div>
            <button type="submit" wire:click="create">Speichern</button>
        </div>
        <div>
            @if (session()->has('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>


    <script>
        tinymce.init({
            selector: '#editor',
            forced_root_block: false,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    @this.set('document', editor.getContent());
                });
            }
        });
    </script> --}}
    
</body>
</html>

