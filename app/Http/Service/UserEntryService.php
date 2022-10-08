<?php

namespace App\Http\Service;

use Exception;
use App\Models\Merchant;
use App\Models\maternalday;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Repository\UserEntryRepositoryImpl;

class UserEntryService extends Controller
{

    private $userEntry;

    public function __construct(UserEntryRepositoryImpl $userEntry)
    {
        $this->userEntry = $userEntry;
    }

    public function createUserEntry(Request $request)
    {
        // validate 
        $request->validate([
            "name" => "required",
            "Unit" => "required",
            "email" => "required",
            "password" => "required",
            "username" => "required",
            "level" => "required",
        ]);
        $email_validation_regex = '/^\\S+@\\S+\\.\\S+$/';
        $z = preg_match($email_validation_regex, $request->email);
        if ($z == 1) {
            try {
                // Db Transaction
                DB::beginTransaction();
                $this->userEntry->createUserEntry($request);
                DB::commit();
                return redirect('dashboard/userentry/create')->with('success', 'Data Berhasil Ditambahkan ! ');
            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());
                return redirect('dashboard/userentry/create')->with('failed', 'Data Gagal Ditambahkan !' . $e->getMessage());
            }
        } else {
            return redirect('dashboard/userentry/create')->with('failed', 'Format Email Salah!');
        }
    }
    public function UpdateUserEntry(Request $request)
    {
        // validate 
        $request->validate([
            "name" => "required",
            "Unit" => "required",
            "email" => "required",
            "username" => "required",
            "level" => "required",
        ]);
        $email_validation_regex = '/^\\S+@\\S+\\.\\S+$/';
        $z = preg_match($email_validation_regex, $request->email);
        if ($z == 1) {
            try {

                // Db Transaction
                //dd($request);
                DB::beginTransaction();
                $this->userEntry->UpdateUserEntry($request);
                DB::commit();
                return redirect('dashboard/userentry/view/' . $request->id)->with('success', 'Data Berhasil Diedit !');
            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());
                return redirect('dashboard/userentry/view/' . $request->id)->with('failed', $e->getMessage());
            }
        } else {
            return redirect('dashboard/userentry/view/' . $request->id)->with('failed', 'Format Email Salah!');
        }
    }
    public function getDatabyId($id)
    {
        return $this->userEntry->showDatabyId($id);
    }
}
