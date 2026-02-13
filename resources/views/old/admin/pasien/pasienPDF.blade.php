    
    <table>
        <tr style="border-bottom: double;">
            <td style="width: 200px;">
                <img src="{{public_path('ham/kemenkes.png')}}" alt="KMENKES Logo" class="brand-image" style="width: 200px;">
            </td>
            <td style="width:700px;text-align: center;">
                <div style="text-align: center;">
                    <h3 style="margin: 0px; font-size: 24px;"> IKHTISAR PERAWATAN HIV DAN TERAPI ANTIRETROVIRAL (ART)</h3>
                    <h3 style="margin: 0px; font-size: 24px;">HKBP AIDS MINISTRY BALIGE</h3>
                    <i><span style="margin: 0px; font-size: 12px;">Disiapkan dalam rekam medis pasien dan disimpan di Instalasi Rekam Medis)</span></i>
                    <span style="margin: 0px; font-size: 12px;">Jl. Gereja No.17, Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara</span>
                </div>
            </td>
            <td style="width: 200px;">
                <img src="{{public_path('ham/logo.png')}}" alt="HAM Logo" class="brand-image" style="height: 100px;">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr style="margin: 0px;">
                <hr style="margin: 2px;">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="2"><b>1. Data Identitas Pasien</b></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>No Rekam Medis</b> </td>
            <td><span>{{$data->no_rekam_medis}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>No Registrasi Nasional</b></td>
            <td><span>{{$data->no_reg_nasional}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>NIK</b></td>
            <td><span>{{$data->nik}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>NO KK</b></td>
            <td><span>{{$data->no_kk}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Nama</b></td>
            <td><span>{{$data->nama}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Tanggal Lahir/Umur</b></td>
            <td><span>{{$data->tanggal_lahir}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Jenis Kelamin</b></td>
            <td><span>{{$data->jenis_kelamin}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>No HP</b></td>
            <td><span>{{$data->no_hp}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Alamat</b></td>
            <td><span>{{$data->alamat}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Nama Ibu Kandung</b></td>
            <td><span></span></td>
        </tr>
        <tr>
        
            <td style="width:300px ;"><b>Riwayat Alergi Obat</b></td>
            <td><span>{{$data->riwayat_alergi_obat}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Nama Pengawas Minum Obat (PMO)</b></td>
            <td><span>{{$data->nama_pmo}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Hubungan PMO Dengan Pasien</b></td>
            <td><span>{{$data->hubungan_pmo}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Alamat PMO</b></td>
            <td><span>{{$data->alamat_pmo}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Telp. PMO</b></td>
            <td><span>{{$data->no_hp_pmo}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Tanggal Konfirmasi Tes HIV +</b></td>
            <td><span>{{$data->tanggal_konfirmasi_hiv}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Tempat Tes HIV</b></td>
            <td><span>{{$data->tempat_konfirmasi_hiv}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Entry Point</b></td>
            <td><span>{{$data->entryPoint->nama}}</span></td>
        </tr>
        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2"><b>2. Riwayat Pribadi</b></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Pendidikan</b></td>
            <td><span>{{$data->pendidikan->nama}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Pekerjaan</b></td>
            <td><span>{{$data->pekerjaan->nama}}</span></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Faktor Resiko</b></td>
            <td>
                @foreach($data->faktorResikoPasien as $fr)
                    <span>{{$fr->faktorResiko->nama}}</span>
                @endforeach
            </td>
        </tr>
        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2"><b>3. Riwayat Keluarga/Mitra Seksual/Mitra Penasum</b></td>
        </tr>
        <tr>
            <td style="width:300px ;"><b>Status Pernikahan</b></td>
            <td><span>{{$data->statusPernikahan->nama}}</span></td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="table" style=" border: 1px solid; border-collapse: collapse">
                    <tr>
                        <th style=" border: 1px solid;">Nama</th>
                        <th style=" border: 1px solid;">Umur</th>
                        <th style=" border: 1px solid;">Hubungan</th>
                        <th style=" border: 1px solid;">Status HIV</th>
                        <th style=" border: 1px solid;">Komsumsi ART</th>
                        <th style=" border: 1px solid;">No Reg Nasional</th>
                    </tr>
                    @if(!empty($data->riwayatMitraSeksuals))
                        <tbody>
                            @foreach($data->riwayatMitraSeksuals as $rms)
                            <tr>
                                <td style=" border: 1px solid;">{{$rms->nama}}</td>
                                <td style=" border: 1px solid;">{{$rms->umur}}</td>
                                <td style=" border: 1px solid;">{{$rms->hubunganMitra->nama}}</td>
                                <td style=" border: 1px solid;">{{$rms->statusHiv->nama}}</td>
                                <td style=" border: 1px solid;">{{$rms->komsumsi_art}}</td>
                                <td style=" border: 1px solid;">{{$rms->no_reg_nasional}}</td>
                            </tr>
                            @endforeach
                            @if($data->riwayatMitraSeksual == null)
                            <tr>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                            </tr>
                            @endif
                        </tbody>
                    @endif
                </table>
            </td>
        </tr>
        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2"><b>4. Riwayat Terapi Antiretroviral</b></td>
        </tr>
        @if(!empty($data->riwayatTerapiArt) && $data->riwayatTerapiArt->deleted === 0)
            <tr>
                <td style="width:300px ;"><b>Pernah Menerima ART?</b></td>
                <td><span>{{$data->riwayatTerapiArt->pernah_menerima}}</span></td>
            </tr>
            @if($data->riwayatTerapiArt->pernah_menerima == 'Ya')
                <tr>
                    <td style="width:300px ;">Paduan ART</td>
                    <td>{{$data->riwayatTerapiArt->paduanArt->nama}}</td>
                </tr>
                <tr>
                    <td style="width:300px ;">Tempat Terapi ART</td>
                    <td>{{$data->riwayatTerapiArt->tempatTerapi->nama}}</td>
                </tr>
                <tr>
                    <td style="width:300px ;">Jenis Terapi ART</td>
                    <td>{{$data->riwayatTerapiArt->jenisTerapi->nama}}</td>
                </tr>
                <tr>
                    <td style="width:300px ;">Dosis</td>
                    <td>{{$data->riwayatTerapiArt->dosis_art}}</td>
                </tr>
                <tr>
                    <td style="width:300px ;">Lama Penggunaan</td>
                    <td>{{$data->riwayatTerapiArt->lama_penggunaan}}</td>
                </tr>
            @endif
        @endif        

        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2"><b>5. Pemeriksaan Klinis dan Laboratorium</b></td>
        </tr>
        @if(!empty($data->pemeriksaanKlinis))
            <tr>
                <td colspan="2">
                    <table class="table" style=" border: 1px solid; border-collapse: collapse">
                        <tr>
                            <th style=" border: 1px solid;">Tahap</th>
                            <th style=" border: 1px solid;">Tanggal</th>
                            <th style=" border: 1px solid;">Stad WHO</th>
                            <th style=" border: 1px solid;">Berat Badan</th>
                            <th style=" border: 1px solid;">Status Fungsional</th>
                            <th style=" border: 1px solid;">Jumlah CD4(CD4 % pada anak-anak)</th>
                            <th style=" border: 1px solid;">Viral Load</th>
                            <th style=" border: 1px solid;">Lain-lain</th>
                        </tr>
                        <tbody>
                            @foreach($data->pemeriksaanKlinis as $pk)
                                <tr>
                                    <td style=" border: 1px solid;">{{$pk->kategoriPemeriksaan->nama}}</td>
                                    <td style=" border: 1px solid;">{{$pk->tanggal_pemeriksaan}}</td>
                                    <td style=" border: 1px solid;">{{$pk->standar_klinis}}</td>
                                    <td style=" border: 1px solid;">{{$pk->berat_badan}}</td>
                                    <td style=" border: 1px solid;">{{$pk->statusFungsional->kode }}/{{$pk->statusFungsional->nama }}</td>
                                    <td style=" border: 1px solid;">{{$pk->jumlah_cd4}}</td>
                                    <td style=" border: 1px solid;">{{$pk->viral_load}}</td>
                                    <td style=" border: 1px solid;">{{$pk->lain_lain}}</td>
                                </tr>
                            @endforeach
                            @if($data->pemeriksaanKlinis == null)
                                <tr>
                                    <td style=" border: 1px solid;">-</td>
                                    <td style=" border: 1px solid;">-</td>
                                    <td style=" border: 1px solid;">-</td>
                                    <td style=" border: 1px solid;">-</td>
                                    <td style=" border: 1px solid;">-</td>
                                    <td style=" border: 1px solid;">-</td>
                                    <td style=" border: 1px solid;">-</td>
                                    <td style=" border: 1px solid;">-</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </td>
            </tr>
        @endif
        
        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2"><b>6. Terapi Antiretroviral (ART)</b></td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Nama Paduan ART ORISINAL</b><br>
                <?php $i=1; ?>
                @foreach($paduanArt as $pd)
                <span>{{$i}}. {{$pd->nama}}</span><br>
                <?php $i++; ?>
                @endforeach
            </td>
            <td>
                @if(!empty($data->terapiArt))
                    <table class="table" style=" border: 1px solid; border-collapse: collapse">
                        <tr>
                            <th style=" border: 1px solid;">Tanggal</th>
                            <th style=" border: 1px solid;">Fase</th>
                            <th style=" border: 1px solid;">Alasan</th>
                            <th style=" border: 1px solid;">Penjelasan</th>
                            <th style=" border: 1px solid;">Paduan Baru</th>
                        </tr>
                        <tbody>
                            @foreach($data->terapiArt as $ta)
                            @if($ta->deleted == 0)
                            <tr>
                                <td style=" border: 1px solid;">{{$ta->tanggal_mulai}}</td>
                                <td style=" border: 1px solid;">{{$ta->fase}}</td>
                                <td style=" border: 1px solid;">{{$ta->alasan->nama}}</td>
                                <td style=" border: 1px solid;">{{$ta->penjelasan}}</td>
                                <td style=" border: 1px solid;">{{$ta->paduanArt->nama}}</td>
                            </tr>
                            @endif
                            @endforeach
                            @if($data->terapiArt == null)
                            <tr>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                @endif
            </td>
        </tr>
        
        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2"><b>7. Pengobatan TB Selama Perawatan HIV</b></td>
        </tr>
        <tr>
            <td colspan="2">
                @if(!empty($data->pengobatanTb))
                    <table class="table" style=" border: 1px solid; border-collapse: collapse">
                        <tr>
                            <th style=" border: 1px solid;">Tanggal Mulai Terapi</th>
                            <th style=" border: 1px solid;">Tanggal Selesai Terapi</th>
                            <th style=" border: 1px solid;">Tipe TB</th>
                            <th style=" border: 1px solid;">Klasifikasi TB</th>
                            <th style=" border: 1px solid;">Lokasi TB</th>
                            <th style=" border: 1px solid;">Paduan TB</th>
                            <th style=" border: 1px solid;">Sarana Kesehatan</th>
                            <th style=" border: 1px solid;">No Reg Tb</th>
                            <th style=" border: 1px solid;">Kabupaten/Kota</th>
                        </tr>
                        <tbody>
                            @foreach($data->pengobatanTb as $pt)
                            @if($pt->deleted == 0)
                            <tr>
                                <td style=" border: 1px solid;">{{$pt->tanggal_mulai_terapi}}</td>
                                <td style=" border: 1px solid;">{{$pt->tanggal_selesai_terapi}}</td>
                                <td style=" border: 1px solid;">{{$pt->tipeTb->nama}}</td>
                                <td style=" border: 1px solid;">{{$pt->klasifikasiTb->nama}}</td>
                                <td style=" border: 1px solid;">{{$pt->lokasi_tb}}</td>
                                <td style=" border: 1px solid;">{{$pt->paduanTb->nama}}</td>
                                <td style=" border: 1px solid;">{{$pt->nama_sarana_kesehatan}}</td>
                                <td style=" border: 1px solid;">{{$pt->no_reg_tb}}</td>
                                <td style=" border: 1px solid;">{{$pt->kabupaten->nama}}</td>
                            </tr>
                            @endif
                            @endforeach
                            @if($data->pengobatanTb == null)
                            <tr>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                                <td style=" border: 1px solid;">-</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                @endif
            </td>
        </tr>
        
        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2"><b>8. Indikasi Inisiasi ART</b></td>
        </tr>
        <tr>
            <td colspan="2">{{$data->iiart->nama}}</td> 
        </tr>
    </table>
    <pagebreak>
        
    <table>
        <tr>
            <td><b>9. IKHTISAR FOLLOW-UP PERAWATAN PASIEN HIV DAN TERAPI ANTIRETROVIRAL (ART)</b></td>
        </tr>
        <tr>
            <td>
                <table class="table" style=" border: 1px solid; border-collapse: collapse">
                    <tr>
                        <th style=" border: 1px solid;">Tanggal Kungjungan (Follow up)</th>
                        <th style=" border: 1px solid;">Rencana Tanggal Kungjungan y.a.d</th>
                        <th style=" border: 1px solid;">BB (kg) & TB untuk anak</th>
                        <th style=" border: 1px solid;">Status Fungsional</th>
                        <th style=" border: 1px solid;">Stad. WHO</th>
                        <th style=" border: 1px solid;">Hamil / Metode KB</th>
                        <th style=" border: 1px solid;">Infeksi Oportunistik (Kode)</th>
                        <th style=" border: 1px solid;">Obat Untuk IO</th>
                        <th style=" border: 1px solid;">Status TB</th>
                        <th style=" border: 1px solid;">PPK</th>
                        <th style=" border: 1px solid;">Obat ARV dan dosis yang diberikan</th>
                        <th style=" border: 1px solid;">Adherance ART</th>
                        <th style=" border: 1px solid;">Efek Samping ART (kode)</th>
                        <th style=" border: 1px solid;">Jumlah CD4</th>
                        <th style=" border: 1px solid;">Viral Load</th>
                        <th style=" border: 1px solid;">Hasil LAB</th>
                        <th style=" border: 1px solid;">Diberikan Kondom</th>
                        <th style=" border: 1px solid;">Rujuk Ke Spesialis atau MRS</th>
                    </tr>
                    @if(count($followupArt) == 0)
                        <tr>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                            <td style=" border: 1px solid;">-</td>
                        </tr>
                    @endif
                    @foreach($followupArt as $fa)
                        <tr>
                            <td style=" border: 1px solid;">{{$fa->tanggal_pengobatan}}</td>
                            <td style=" border: 1px solid;">{{$fa->rencana_kunjungan_selanjutnya}}</td>
                            <td style=" border: 1px solid;">{{$fa->berat_badan}} / {{$fa->tinggi_badan}}</td>
                            <td style=" border: 1px solid;">{{$fa->statusFungsional->nama}}</td>
                            <td style=" border: 1px solid;">{{$fa->stadium_who}}</td>
                            <td style=" border: 1px solid;">{{$fa->hamil}} / {{$fa->metode_kb}}</td>
                            <td style=" border: 1px solid;">{{$fa->infeksiOportunistik->nama}}</td>
                            <td style=" border: 1px solid;">{{$fa->obat_untuk_io}}</td>
                            <td style=" border: 1px solid;">{{$fa->statusTb->nama}}</td>
                            <td style=" border: 1px solid;">{{$fa->ppk}}</td>
                            <td style=" border: 1px solid;">{{$fa->paduan_art}} /  {{$fa->dosis}}</td>
                            <td style=" border: 1px solid;">{{$fa->adherenceArt->nama}}</td>
                            <td style=" border: 1px solid;">{{$fa->efekSamping->nama}}</td>
                            <td style=" border: 1px solid;">{{$fa->jumlah_cd4}}</td>
                            <td style=" border: 1px solid;">{{$fa->viral_load}}</td>
                            <td style=" border: 1px solid;">{{$fa->hasil_lab}}</td>
                            <td style=" border: 1px solid;">{{$fa->diberi_kondom}}</td>
                            <td style=" border: 1px solid;">{{$fa->rujuk_ke_spesialis}}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
           
        </tr>
    </table>
    </pagebreak>
    