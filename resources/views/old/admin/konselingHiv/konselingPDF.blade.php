    
    <table>
        <tr style="border-bottom: double;">
            <td style="width: 200px;">
                <img src="{{public_path('ham/kemenkes.png')}}" alt="KMENKES Logo" class="brand-image" style="width: 200px;">
            </td>
            <td style="width:700px;text-align: center;">
                <div style="text-align: center;">
                    <h3 style="margin: 0px; font-size: 24px;"> KONSELING DAN TES HIV</h3>
                    <h3 style="margin: 0px; font-size: 24px;">HKBP AIDS MINISTRY BALIGE</h3>
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
            <td style="width:300px ;">
                <b>No Rekam Medis</b>
            </td>
            <td>
                <span>{{$data->pasien->no_rekam_medis}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>No Registrasi</b>
            </td>
            <td>
                <span>{{$data->no_registrasi}}</span>
            </td>
        </tr>

        <tr>
            <td style="width:300px ;">
                <b>Tanggal Konseling</b>
            </td>
            <td>
                <span>{{$data->tanggal_konseling}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Nama</b>
            </td>
            <td>
                <span>{{$data->pasien->nama}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Umur</b>
            </td>
            <td>
                <span>{{$umur}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Jenis Kelamin</b>
            </td>
            <td>
                <span>{{$data->pasien->jenis_kelamin}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>NIK</b>
            </td>
            <td>
                <span>{{$data->pasien->nik}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>NO KK</b>
            </td>
            <td>
                <span>{{$data->pasien->no_kk}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Status Pernikahan</b>
            </td>
            <td>
                <span>{{$data->statusPernikahan->nama}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>No HP</b>
            </td>
            <td>
                <span>{{$data->pasien->no_hp}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Alamat</b>
            </td>
            <td>
                <span>{{$data->alamat}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Pendidikan Terakhir</b>
            </td>
            <td>
                <span>{{$data->pendidikan->nama}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Pekerjaan</b>
            </td>
            <td>
                <span>{{$data->pekerjaan->nama}}</span>
            </td>
        </tr>
        @if($data->pasien->jenis_kelamin == 'Laki-laki')
        <tr>
            <td style="width:300px ;">
                <b>Memiliki Pasangan Perempuan</b>
            </td>
            <td>
                <span>{{$data->ada_pasangan_perempuan}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Pasangan Hamil</b>
            </td>
            <td>
                <span>{{$data->pasangan_hamil}}</span>
            </td>
        </tr>
        @endif
        @if($data->pasien->jenis_kelamin == 'Perempuan')
        <tr>
            <td style="width:300px ;">
                <b>Jumlah Pasangan Laki-laki</b>
            </td>
            <td>
                <span>{{$data->jumlah_pasangan_laki_laki}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Status Kehamilan</b>
            </td>
            <td>
                <span>{{$data->status_kehamilan}}</span>
            </td>
        </tr>
        @endif
        <tr>
            <td style="width:300px ;">
                <b>Jumlah Anak Kandung</b>
            </td>
            <td>
                <span>{{$data->jumlah_anak_kandung}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Umur Anak Terakhir</b>
            </td>
            <td>
                <span>{{$data->umur_anak_terakhir}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Kelompok Resiko</b>
            </td>
            <td>
                @if(count($data->kelompokResikoKonseling)>0)
                <table>
                    @foreach($data->kelompokResikoKonseling as $dkrk)
                    <tr>
                        <td style="width: 250px ;">
                            {{$dkrk->kelompokResiko->nama}}
                        </td>
                        <td>
                            {{$dkrk->lama_tahun}} Tahun {{$dkrk->lama_bulan}} Bulan
                        </td>
                    </tr>
                    @endforeach
                </table>

                @endif
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Tanggal Konseling Pra Tes HIVs</b>
            </td>
            <td>
                <span>{{$data->tanggal_konseling_pra_tes_hiv}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Status Pasien</b>
            </td>
            <td>
                <span>{{$data->status_pasien}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Alasan Tes HIV</b>
            </td>
            <td>
                <span>{{$data->alasanTes->nama}}</span>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Info Tes HIV</b>
            </td>
            <td>
                @if(count($data->infoTesHivKonseling)>0)
                    @foreach($data->infoTesHivKonseling as $ithk)
                        <span>{{$ithk->infoTesHiv->nama}}</span><br>
                    @endforeach
                @endif
            </td>
        </tr>
        <tr>
            <td style="width:300px ; vertical-align:text-top;">
                <b>Pernah Tes HIV Sebelumnya</b>
            </td>
            <td>
                <span>{{$data->pernah_tes_hiv_sebelumnya}}</span>
                @if($data->pernah_tes_hiv_sebelumnya == 'Ya')
                    <br>

                    <table>
                        <tr>
                            <td style="width: 250px;">
                            <b>Dimana</b>
                            </td>
                            <td>
                                <span>{{$data->rekapTesHivKonseling->hasil}}</span>
                            </td>

                        <tr>
                            <td style="width: 250px;">
                            <b>Kapan</b>
                            </td>
                            <td>
                                <span>{{$data->rekapTesHivKonseling->tempat_tes}}</span>
                            </td>

                        <tr>
                            <td style="width: 250px;">
                                <b>Hasil</b>
                            </td>
                            <td>
                                <span>{{$data->rekapTesHivKonseling->hasil}}</span>
                            </td>
                        </tr>
                    </table>
                @endif

            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Kajian Tingkat Resiko</b>
            </td>
            <td>
                <table>
                    @if(count($data->kajianResikoHiv)>0)
                        @foreach($data->kajianResikoHiv as $ktr)
                        <tr>
                            <td style="width: 250px;">
                                <b>{{$ktr->tingkatResiko->nama}}</b>
                            </td>
                            <td>
                                {{$ktr->tanggal}}
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:300px ;">
                <b>Kesediaan Tes HIV</b>
            </td>
            <td>
                <span>{{$data->kesediaan_tes_hiv}}</span>
            </td>
        </tr>

        @if($data->kesediaan_tes_hiv == 'Ya')
            <tr>
                <td colspan="2">
                    <b>Hasil Tes HIV</b>
                </td>
            </tr>

            @if($data->rekapTesHivKonseling)
                <tr>
                    <td style="width:300px ;">
                        <b>Tanggal Tes HIV</b>
                    </td>
                    <td>
                        <span>{{$data->tesHivKonseling->tanggal_tes}}</span>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px ;">
                        <b>Jenis Tes HIV</b>
                    </td>
                    <td>
                        <span>{{$data->tesHivKonseling->jenis_tes}}</span>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px ;">
                        <b>Hasil Tes R1</b>
                    </td>
                    <td>
                        <span>{{$data->tesHivKonseling->tes_r1}}</span> / <b>Reagen</b> <i>{{$data->tesHivKonseling->reagen_r1}}</i>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px ;">
                        <b>Hasi Tes R2</b>
                    </td>
                    <td>
                        <span>{{$data->tesHivKonseling->tes_r2}}</span> / <b>Reagen</b> <i>{{$data->tesHivKonseling->reagen_r2}}</i>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px ;">
                        <b>Hasil Tes R3</b>
                    </td>
                    <td>
                        <span>{{$data->tesHivKonseling->tes_r3}}</span> / <b>Reagen</b> <i>{{$data->tesHivKonseling->reagen_r3}}</i>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px ;">
                        <b>Kesimpulan Tes HIV</b>
                    </td>
                    <td>
                        <b><span>{{$data->tesHivKonseling->hasil}}</span></b>
                    </td>
                </tr>
            @endif
        @endif
        <tr>
            <td style="width:300px ;">
                <b>Tanggal Konseling Pasca Tes HIV</b>
            </td>
            <td>
                <span>{{$data->tanggal_konseling_pasca_tes_hiv}}</span>
            </td>
        </tr>
    </table>