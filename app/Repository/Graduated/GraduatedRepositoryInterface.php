<?php

namespace App\Repository\Graduated;

use http\Env\Request;

interface GraduatedRepositoryInterface {
    public function Index();

    public function Create();

    public function softDeletes($request);

    public function edit($id);

    public function destroy($id);

}
