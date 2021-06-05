<?php

function format_tanggal($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function format_notif_jam($timestamp){  
    $time_ago = strtotime($timestamp);  
    $current_time = time();  
    $time_difference = $current_time - $time_ago;  
    $seconds = $time_difference;  
    $minutes      = round($seconds / 60 );        // value 60 is seconds  
    $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
    $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
    $weeks        = round($seconds / 604800);     // 7*24*60*60;  
    $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
    $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if($seconds <= 60) {  
     return "Baru Saja";  
    } else if($minutes <=60) {  
     if($minutes==1){  
       return "1 menit lalu";  
     }else {  
       return "$minutes menit lalu";  
     }  
    } else if($hours <=24) {  
     if($hours==1) {  
       return "sejam lalu";  
     } else {  
       return "$hours jam lalu";  
     }  
    }else if($days <= 7) {  
     if($days==1) {  
       return "kemarin";  
     }else {  
       return "$days hari lalu";  
     }  
    }else if($weeks <= 4.3) {  //4.3 == 52/12
     if($weeks==1){  
       return "minggu lalu";  
     }else {  
       return "$weeks minggu lalu";  
     }  
    } else if($months <=12){  
     if($months==1){  
       return "sebulan lalu";  
     }else{  
       return "$months bulan lalu";  
     }  
    }else {  
     if($years==1){  
       return "setahun lalu";  
     }else {  
       return "$years tahun lalu";  
     }  
    }  
} 

function cek_status_anggota($status){
    switch($status){
        case 0:
        echo "<label class='badge badge-warning'>Sedang Tahap Review</label>";
        break;
        case 1:
        echo "<label class='badge badge-success'>Telah Aktif</label>";
        break;
        case 2:
        echo "<label class='badge badge-default'>Akun Ditolak</label>";
        break;
        default:
        echo "none ";
        break;
    }
}


function status_kas($status){
    switch($status){
        case 1:
            echo "<label class='badge badge-success'>Aktif</label>";
        break;
        case 0: 
            echo "<label class='badge badge-danger'> Non Aktif</label>";
        break;
        default:
    break;
    }
}


function status_metode($status){
    switch($status){
        case 1:
            echo "<label class='badge badge-success'>Langsung</label>";
        break;
        case 2: 
            echo "<label class='badge badge-primary'> Transfer</label>";
        break;
        default:
    break;
    }
}

function status_tarik($status){
    switch($status){
        case 0:
            echo "<label class='badge badge-warning'>Menuggu konfirmasi</label>";
        break;
        case 1: 
            echo "<label class='badge badge-success'>Penarikan Berhasil</label>";
        break;
            case 2: 
            echo "<label class='badge badge-danger'>Penarikan Ditolak</label>";
        break;
        default:
    break;
    }
}

function preview_file($nama_file){ /*ini menggunakanan paramerter $nama_file*/
    $url_sh=substr($nama_file,0,-4);
    $url_klik= url('upload/berkas/'.$nama_file);
    // ini link dari route
    $url_pdf=url('upload/berkas/'.$url_sh);
    
    $link_image="window.open('".$url_klik."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";
    $link_pdf="window.open('".$url_pdf."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";

    $file_path = pathinfo(storage_path().'/upload/berkas/'.$nama_file);
    switch(strtolower($file_path['extension'])){
        case"jpg":case"png":case"jpeg":
            echo '
            <a href="" onclick="'.$link_image.'">';
            echo "<img src='$url_klik' style='width:100px; height:100px'><br/>";
            echo "Klik Untuk Lebih Detail";
            echo "</a>";
        break;
        case"pdf":case"PDF":
            echo '
            <a href="" onclick="'.$link_pdf.'">';
        
            echo "<i class='fas fa-file-pdf' style='font-size:100px;color:#D81F28'></i><br/>";
            echo "Preview file <br>";
         
            echo "</a>";
        break;	
        default:
        echo "File tidak ditemukan";
        break;	

    }
}

// end preview syarat

// preview panduan
function preview_panduan($nama_file){
  
    $url_sh=substr($nama_file,0,-4);
    // ini link dari route
    $url_pdf=url('upload/panduan/'.$url_sh);
    
    $link_pdf="window.open('".$url_pdf."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";
    if($nama_file!= ""){
    $file_path = pathinfo(storage_path().'/upload/panduan/'.$nama_file);
    switch(strtolower($file_path['extension'])){
        case"pdf":case"PDF":
            echo '
            <a href="" onclick="'.$link_pdf.'">';
        
            echo "<i class='fas fa-file-pdf' style='font-size:20px;color:#D81F28'></i>";
            echo " Preview<br>";
         
            echo "</a>";
        break;	
        default:
        echo "File tidak ditemukan";
        break;	
        }     
    }

}

// end panduan

// start perview bukti

function preview_user($nama_file){ /*ini menggunakanan paramerter $nama_file*/
    $url_sh=substr($nama_file,0,-4);
    $url_klik= url('upload/user/'.$nama_file);
    // ini link dari route
    
    $link_image="window.open('".$url_klik."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";

    if($nama_file!= ""){

    $file_path = pathinfo(storage_path().'/upload/user/'.$nama_file);
    switch(strtolower($file_path['extension'])){
        case"jpg":case"png":case"jpeg":
            echo '
            <a href="" onclick="'.$link_image.'">';
            echo "<img src='$url_klik' style='width:100px; height:100px'><br/>";
            echo "Klik Untuk Lebih Detail";
            echo "</a>";
        break;
        default:
        echo "File tidak ditemukan";
        break;	
    }

    }
}
// end perview bukti

// preview proposal
function preview_proposal($nama_file){ /*ini menggunakanan paramerter $nama_file*/
    $url_sh=substr($nama_file,0,-4);
    $url_klik= url('upload/berkas/'.$nama_file);
    // ini link dari route
    $url_pdf=url('upload/berkas/'.$url_sh);
    
    $link_image="window.open('".$url_klik."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";
    $link_pdf="window.open('".$url_pdf."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";

    $file_path = pathinfo(storage_path().'/upload/berkas/'.$nama_file);
    switch(strtolower($file_path['extension'])){
        case"jpg":case"png":case"jpeg":
            echo '
            <a href="" onclick="'.$link_image.'">';
            echo "<img src='$url_klik' style='width:100px; height:100px'><br/>";
            echo "Klik Untuk Lebih Detail";
            echo "</a>";
        break;
        case"pdf":case"PDF":
            echo '
            <a href="" onclick="'.$link_pdf.'">';
        
            echo "<i class='fas fa-file-pdf' style='font-size:20px;color:#D81F28'></i><br/>";
            echo "Preview file ";
         
            echo "</a>";
        break;	
        default:
        echo "File tidak ditemukan";
        break;	

    }
}

function download_file($file){
    $url_sh=$file;
    $url_klik= url('upload/berkas/'.$file);
    // ini link dari route
    $url_pdf=url('upload/berkas/'.$url_sh);
    echo "<a download='$file' href='$url_pdf'> Download</a>";
    // <a download='name_of_downloaded_file' href='path/to/the/download/file'> Download</a>
}


// end preview porposal


function status_transfer($status){
    switch($status){
        case 0:
            echo "<label class='badge badge-warning'>Menunggu persetujuan</label>";
        break;
        case 1:
            echo "<label class='badge badge-success'>Transfer diterima</label>";
        break;
        case 2:
            echo "<label class='badge badge-danger'>Transfer ditolak</label>";
        break;
        default:
        echo"tidak ada";
    break;
    }
}

// pengecekan link bukti bayar di admin
  


    // pengecekan link status tarik dana
   

        function akses($status){
            switch($status){
                case 1:
                    echo "Admin (Asisten Manager)";
                break;
                case 2:
                    echo "Pengurus";
                break;
                case 4: 
                    echo "Manager";
                break;
                default:
                echo "Tidak ada akses";
            break;
            }
        }

        function luaran_wajib($status){
            switch($status){
                case 1:
                    echo "Jurnal Nasional Terakreditasi";
                break;
                case 2:
                    echo "Jurnal Nasional Tidak Terakreditasi";
                break;
                case 3: 
                    echo  "Jurnal Internasional Bereputasi";
                break;
                case 4: 
                    echo  "Jurnal Internasional Tidak Bereputasi";
                break;
                default:
                echo "Tidak ada Luaran";
            break;
            }
        }

        function luaran_tambahan($status){
            switch($status){
                case 1:

                    echo "Model";
                break;
                case 2:
                    echo "Prototipe";
                break;
                case 3: 
                    echo  "Teknologi Tepat Guna";
                break;
                case 4: 
                    echo  "Draft Paten";
                break;
                case 5: 
                    echo  "Desain Industri";
                break;
                case 6: 
                    echo  "Hak Cipta";
                break;
                case 7: 
                    echo  "Luaran Lainya";
                break;
                default:
                echo "Tidak ada Luaran";
            break;
            }
        }


        function status_usulan($status){
            switch($status){
                
                case 1:
                    echo "Diproses";
                break;
                case 2: 
                    echo  "Disetujui";
                break;
                case 3: 
                    echo  "Penilaian";
                break;
                case 4: 
                    echo  "Didanai";
                break;
                case 5:
                    echo "Ditolak";
                break;
                default:
                echo "Tidak ada status";
            break;
            }
        }

        function label_usulan($status){
            switch($status){
                
                case 1:
                    echo "<label class='badge badge-secondary'>Diproses</label>";
                break;
                case 2: 
                    echo  "<label class='badge badge-primary'>Disetujui</label>";
                break;
                case 3: 
                    echo  "<label class='badge badge-info'>Penilaian</label>";
                break;
                case 4: 
                    echo  "<label class='badge badge-success'>Didanai</label>";
                break;
                case 5:
                    echo "<label class='badge badge-danger'>Didanai</label>";
                break;
                default:
                echo "Tidak ada status";
            break;
            }
        }

        function status_biaya($status){
            switch($status){
                case 0:
                    echo "Belum Biayai";
                break;
                case 1:
                    echo "Dibiayai";
                break;
                default:
                echo "Tidak ada status";
            break;
            }
        }

        function status_unggah($status){
            switch($status){
                case 1:
                    echo "Pencairan Dana";
                break;
                case 2:
                    echo "Laporan Kemajuan";
                break;
                case 3:
                    echo "Laporan Akhir";
                break;
                default:
                echo "Tidak ada status";
            break;
            }
        }