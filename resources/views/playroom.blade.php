<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Document</title>
</head>
<body>
    <div>

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
    </script>
    
</body>
</html>

