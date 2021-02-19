$(document).ready(function () {
    function upload_image(blobInfo, success, failure, progress) {
        var xhr, formData;

        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open("POST", "/blog/upload/image");

        xhr.upload.onprogress = function (e) {
            progress((e.loaded / e.total) * 100);
        };

        xhr.onload = function () {
            var json;

            console.log("Here 2");

            if (xhr.status === 403) {
                failure("HTTP Error: " + xhr.status, { remove: true });
                return;
            }

            if (xhr.status < 200 || xhr.status >= 300) {
                failure("HTTP Error: " + xhr.status);
                return;
            }

            json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location != "string") {
                failure("Invalid JSON: " + xhr.responseText);
                return;
            }

            success(json.location);
        };

        xhr.onerror = function () {
            failure(
                "Image upload failed due to a XHR Transport error. Code: " +
                    xhr.status
            );
        };

        formData = new FormData();
        console.log(formData);
        formData.append("file", blobInfo.blob(), blobInfo.filename());
        console.log(formData);

        xhr.send(formData);
    }

    /* Modal for Code Snippet */
    var codeSnippetModal = {
        title: "Code Snippet",
        body: {
            type: "panel",
            items: [
                {
                    type: "textarea",
                    name: "codeSnippet",
                    label: "Enter the Code Snippet",
                },
            ],
        },
        buttons: [
            {
                type: "cancel",
                name: "closeButton",
                text: "Cancel",
            },
            {
                type: "submit",
                name: "submitButton",
                text: "Add",
                primary: true,
            },
        ],
        onSubmit: function (api) {
            var data = api.getData();

            tinymce.activeEditor.execCommand(
                "mceInsertContent",
                false,
                "<div>" + Object.values(data) + "</div>"
            );
            api.close();
        },
    };

    // TinyMCE -  Init
    tinymce.init({
        selector: ".editor",
        min_height: 500,
        relative_urls: false,
        paste_data_images: true,
        image_title: true,
        automatic_uploads: true,
        images_upload_url: "/blog/upload/image",
        file_picker_types: "image",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table emoticons template paste help",
        ],
        toolbar:
            "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | " +
            "bullist numlist outdent indent | link image code_snippet | print preview media fullpage | " +
            "forecolor backcolor emoticons | help",
        menu: {
            favs: {
                title: "My Favorites",
                items: "code visualaid | searchreplace | emoticons",
            },
        },
        menubar: "favs file edit view insert format tools table help",
        statusbar: false,
        setup: function (editor) {
            /* Basic button that just inserts code snippets */
            editor.ui.registry.addButton("code_snippet", {
                text: "Code Snippet",
                tooltip: "Insert Code Snippet",
                onAction: function (_) {
                    editor.windowManager.open(codeSnippetModal);
                    console.log("clieked");
                },
            });
        },
        // images_upload_handler: upload_image,
        // override default upload handler to simulate successful upload
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("accept", "image/*");
            input.onchange = function () {
                var file = this.files[0];
                console.log(this.files);

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = "blobid" + new Date().getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(",")[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            console.log(input);
            input.click();
        },
    });
});

// Create Slug from text
function slugify(text) {
    return text
        .toString() // Cast to string
        .toLowerCase() // Convert the string to lowercase letters
        .normalize("NFD") // The normalize() method returns the Unicode Normalization Form of a given string.
        .trim() // Remove whitespace from both sides of a string
        .replace(/\s+/g, "-") // Replace spaces with -
        .replace(/[^\w\-]+/g, "") // Remove all non-word chars
        .replace(/\-\-+/g, "-"); // Replace multiple - with single -
}

// Create slug on keyup in title field
function createSlug() {
    title = document.getElementById("title").value;
    slug = slugify(title);
    document.getElementById("slug").value = slug;
}
