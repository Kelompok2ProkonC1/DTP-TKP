<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function index()
    {
        return view('qrcode');
    }
    public function download()
    {
        $imageName = 'qrcode.png';
        $header = array('Content-Type' => ['png', 'svg', 'eps']);
        $qrcode = QrCode::format('png')->size('200')->errorCorrection('H')->generate('latihan-qrcode');
        Storage::disk('public')->put($imageName, $qrcode);
        return response()->download('storage/' . $imageName, $imageName, $header)->deleteFileAfterSend();
    }
}
