<?php

namespace Modules\Media\Models;

use Modules\Core\Models\BaseModel;

class MediaFile extends BaseModel {

    protected $table = "media_files";

    protected $fillable = [
        "file_name",
        "file_path",
        "file_size",
        "file_type",
        "file_extension",
        "driver",
        "url",
        "user_create",
        "user_update"
    ];


}
