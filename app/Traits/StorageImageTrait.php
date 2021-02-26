<?php
    namespace App\Traits;
    use Storage;
    use Illuminate\Support\Str;
    trait StorageImageTrait{

        public function storageTraitUpload($request,$fileName,$folderName)
        {
            if($request->hasFile($fileName))
            {
                $file=$request->$fileName;
                $fileNameOrigin=$file->getClientOriginalName();
                $fileNameHash=Str::random(20).'.'.$file->getClientOriginalExtension();
                
                $filePath = $request->file($fileName)->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash );
                
                $data=[
                    'fileName'=>$fileNameOrigin,
                    'filePath'=>Storage::url($filePath)
                    
                ];
                return $data;
            }
           return null;
        }
        public function storageTraitUploadMutiple($file,$folderName)
        {
            $fileNameOrigin=$file->getClientOriginalName();
            $fileNameHash=Str::random(20).'.'.$file->getClientOriginalExtension();           
            $filePath = $file->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash );
            
            $data=[
                'fileName'=>$fileNameOrigin,
                'filePath'=>Storage::url($filePath)
                
            ];
            return $data;
        }
    }


?>