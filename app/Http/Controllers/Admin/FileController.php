<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $storageInfo=$this->getDiskSpace();
//        $storageInfo=json_decode($storageInfo,true);
        return view('admin.file.dashboard', [
            'storage' => $storageInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getDiskSpace()
    {
        $totalSpace = disk_total_space('/');
        $freeSpace = disk_free_space('/');

        $totalSpaceInGB = round($totalSpace / (1024 * 1024 * 1024), 0);
        $freeSpaceInGB = round($freeSpace / (1024 * 1024 * 1024), 0);
//        return "Total disk space: {$totalSpaceInGB} GB | Free disk space: {$freeSpaceInGB} GB";

        $storageInfo = new \stdClass();
        $storageInfo->totalSpace = $totalSpaceInGB;
        $storageInfo->freeSpace = $freeSpaceInGB;
        $storageInfo->usedSpace = $totalSpaceInGB-$freeSpaceInGB;
        return $storageInfo;
    }

    public function getDir()
    {
        $directories = Storage::disk('public')->directories();


        return $directories;
    }
    public function getFile()
    {
//        $files = Storage::disk('public')->files();
        $files = Storage::disk('public')->allFiles();

        return $files;
    }


}
