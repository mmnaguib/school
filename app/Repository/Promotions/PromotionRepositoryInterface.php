<?php
namespace App\Repository\Promotions;

use http\Env\Request;

interface PromotionRepositoryInterface {
    public function index();

    public function storePromotion($request);

    public function create();

    public function destroy($request);
}
