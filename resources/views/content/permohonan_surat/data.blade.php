@extends('layouts/contentLayoutMaster')


@include('content.permohonan_surat.script', ['section' => 'title'])
@include('content.permohonan_surat.script', ['section' => 'vendor-style'])
@include('content.permohonan_surat.script', ['section' => 'page-style'])
@include('content.permohonan_surat.script', ['section' => 'content-sidebar'])


@section('content')
    <div class="body-content-overlay"></div>
    <!-- Email list Area -->
    <div class="email-app-list">
        <!-- Email search starts -->
        <div class="app-fixed-search d-flex align-items-center">
            <div class="sidebar-toggle d-block d-lg-none ms-1">
                <i data-feather="menu" class="font-medium-5"></i>
            </div>
            <div class="d-flex align-content-center justify-content-between w-100">
                <div class="input-group input-group-merge" style="flex-wrap: nowrap">
                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                    <input type="text" class="form-control" id="email-search" placeholder="Search email"
                        aria-label="Search..." aria-describedby="email-search" />
                </div>
            </div>
        </div>
        <!-- Email search ends -->

        <!-- Email actions starts -->
        <div class="app-action">
            <div class="action-left">
                <div class="form-check selectAll">
                    <input type="checkbox" class="form-check-input" id="selectAllCheck" />
                    <label class="form-check-label fw-bolder ps-25" for="selectAllCheck">Select All</label>
                </div>
            </div>
            <div class="action-right">
                <ul class="list-inline m-0">
                    <li class="list-inline-item mail-unread">
                        <span class="action-icon"><i data-feather="archive" class="font-medium-2"></i></span>
                    </li>
                    <li class="list-inline-item mail-delete">
                        <span class="action-icon"><i data-feather="trash-2" class="font-medium-2"></i></span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Email actions ends -->

        <!-- Email list starts -->
        <div class="email-user-list">
            <ul class="email-media-list">
                <li class="d-flex user-mail mail-read">
                    <div class="mail-left pe-50">
                        <div class="avatar">
                            <img src="{{ asset('images/portrait/small/avatar-s-20.jpg') }}" alt="avatar img holder" />
                        </div>
                        <div class="user-action">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck1" />
                                <label class="form-check-label" for="customCheck1"></label>
                            </div>
                            <span class="email-favorite"><i data-feather="star"></i></span>
                        </div>
                    </div>
                    <div class="mail-body">
                        <div class="mail-details">
                            <div class="mail-items">
                                <h5 class="mb-25">Tonny Deep</h5>
                                <span class="text-truncate">🎯 Focused impactful open system </span>
                            </div>
                            <div class="mail-meta-item">
                                <span class="me-50 bullet bullet-success bullet-sm"></span>
                                <span class="mail-date">4:14 AM</span>
                            </div>
                        </div>
                        <div class="mail-message">
                            <p class="text-truncate mb-0">
                                Hey John, bah kivu decrete epanorthotic unnotched Argyroneta nonius veratrine preimaginary
                                saunders
                                demidolmen Chaldaic allusiveness lorriker unworshipping ribaldish tableman hendiadys
                                outwrest unendeavored
                                fulfillment scientifical Pianokoto CheloniaFreudian sperate unchary hyperneurotic phlogiston
                                duodecahedron
                                unflown Paguridea catena disrelishable Stygian paleopsychology cantoris phosphoritic
                                disconcord fruited
                                inblow somewhatly ilioperoneal forrard palfrey Satyrinae outfreeman melebiose
                            </p>
                        </div>
                    </div>
                </li>
                <li class="d-flex user-mail">
                    <div class="mail-left pe-50">
                        <div class="avatar">
                            <img src="{{ asset('images/portrait/small/avatar-s-17.jpg') }}"
                                alt="Generic placeholder image" />
                        </div>
                        <div class="user-action">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck2" />
                                <label class="form-check-label" for="customCheck2"></label>
                            </div>
                            <span class="email-favorite"><i data-feather="star"></i></span>
                        </div>
                    </div>
                    <div class="mail-body">
                        <div class="mail-details">
                            <div class="mail-items">
                                <h5 class="mb-25">Louis Welch</h5>
                                <span class="text-truncate">Thanks, Let's do it.🤩</span>
                            </div>
                            <div class="mail-meta-item">
                                <span class="me-50 bullet bullet-danger bullet-sm"></span>
                                <span class="mail-date">2:15 AM</span>
                            </div>
                        </div>
                        <div class="mail-message">
                            <p class="mb-0 text-truncate">
                                Hi, Can we connect today? Cheesecake croissant jelly beans. Cake caramels pie chocolate.
                                Muffin jujubes
                                dragée carrot cake candy icing bonbon. Danish caramels topping oat cake sweet roll liquorice
                                tootsie roll
                                halvah.Chocolate bar jujubes jelly-o tart tiramisu croissant dragée cupcake jelly.
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="no-results">
                <h5>No Items Found</h5>
            </div>
        </div>
        <!-- Email list ends -->
    </div>
    <!--/ Email list Area -->
    <!-- Detailed Email View -->
    <div class="email-app-details">
        <!-- Detailed Email Header starts -->
        <div class="email-detail-header">
            <div class="email-header-left d-flex align-items-center">
                <span class="go-back me-1"><i data-feather="chevron-left" class="font-medium-4"></i></span>
                <h4 class="email-subject mb-0">Focused open system 😃</h4>
            </div>
            <div class="email-header-right ms-2 ps-1">
                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <span class="action-icon favorite"><i data-feather="star" class="font-medium-2"></i></span>
                    </li>
                    <li class="list-inline-item">
                        <div class="dropdown no-arrow">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i data-feather="folder" class="font-medium-2"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="folder">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i data-feather="edit-2" class="font-medium-3 me-50"></i>
                                    <span>Draft</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i data-feather="info" class="font-medium-3 me-50"></i>
                                    <span>Spam</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i data-feather="trash" class="font-medium-3 me-50"></i>
                                    <span>Trash</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="dropdown no-arrow">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i data-feather="tag" class="font-medium-2"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="tag">
                                <a href="#" class="dropdown-item"><span
                                        class="me-50 bullet bullet-success bullet-sm"></span>Personal</a>
                                <a href="#" class="dropdown-item"><span
                                        class="me-50 bullet bullet-primary bullet-sm"></span>Company</a>
                                <a href="#" class="dropdown-item"><span
                                        class="me-50 bullet bullet-warning bullet-sm"></span>Important</a>
                                <a href="#" class="dropdown-item"><span
                                        class="me-50 bullet bullet-danger bullet-sm"></span>Private</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <span class="action-icon"><i data-feather="mail" class="font-medium-2"></i></span>
                    </li>
                    <li class="list-inline-item">
                        <span class="action-icon"><i data-feather="trash" class="font-medium-2"></i></span>
                    </li>
                    <li class="list-inline-item email-prev">
                        <span class="action-icon"><i data-feather="chevron-left" class="font-medium-2"></i></span>
                    </li>
                    <li class="list-inline-item email-next">
                        <span class="action-icon"><i data-feather="chevron-right" class="font-medium-2"></i></span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Detailed Email Header ends -->

        <!-- Detailed Email Content starts -->
        <div class="email-scroll-area">
            <div class="row">
                <div class="col-12">
                    <div class="email-label">
                        <span class="mail-label badge rounded-pill badge-light-primary">Company</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header email-detail-head">
                            <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                <div class="avatar me-75">
                                    <img src="{{ asset('images/portrait/small/avatar-s-9.jpg') }}" alt="avatar img holder"
                                        width="48" height="48" />
                                </div>
                                <div class="mail-items">
                                    <h5 class="mb-0">Carlos Williamson</h5>
                                    <div class="email-info-dropup dropdown">
                                        <span role="button" class="dropdown-toggle font-small-3 text-muted"
                                            id="card_top01" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            carlos@gmail.com
                                        </span>
                                        <div class="dropdown-menu" aria-labelledby="card_top01">
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-end">From:</td>
                                                        <td>carlos@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end">To:</td>
                                                        <td>johndoe@ow.ly</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end">Date:</td>
                                                        <td>14:58, 29 Aug 2020</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mail-meta-item d-flex align-items-center">
                                <small class="mail-date-time text-muted">29 Aug, 2020, 14:58</small>
                                <div class="dropdown ms-50">
                                    <div role="button" class="dropdown-toggle hide-arrow" id="email_more"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical" class="font-medium-2"></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="email_more">
                                        <div class="dropdown-item"><i data-feather="corner-up-left"
                                                class="me-50"></i>Reply</div>
                                        <div class="dropdown-item"><i data-feather="corner-up-right"
                                                class="me-50"></i>Forward</div>
                                        <div class="dropdown-item"><i data-feather="trash-2" class="me-50"></i>Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mail-message-wrapper pt-2">
                            <div class="mail-message">
                                <p class="card-text">Hey John,</p>
                                <p class="card-text">
                                    bah kivu decrete epanorthotic unnotched Argyroneta nonius veratrine preimaginary
                                    saunders demidolmen
                                    Chaldaic allusiveness lorriker unworshipping ribaldish tableman hendiadys outwrest
                                    unendeavored
                                    fulfillment scientifical Pianokoto Chelonia
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header email-detail-head">
                            <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                <div class="avatar me-75">
                                    <img src="{{ asset('images/portrait/small/avatar-s-18.jpg') }}"
                                        alt="avatar img holder" width="48" height="48" />
                                </div>
                                <div class="mail-items">
                                    <h5 class="mb-0">Ardis Balderson</h5>
                                    <div class="email-info-dropup dropdown">
                                        <span role="button" class="dropdown-toggle font-small-3 text-muted"
                                            id="dropdownMenuButton200" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            abaldersong@utexas.edu
                                        </span>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton200">
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-end">From:</td>
                                                        <td>abaldersong@utexas.edu</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end">To:</td>
                                                        <td>johndoe@ow.ly</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end">Date:</td>
                                                        <td>4:25 AM 13 Jan 2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mail-meta-item d-flex align-items-center">
                                <small class="mail-date-time text-muted">17 May, 2020, 4:14</small>
                                <div class="dropdown ms-50">
                                    <div role="button" class="dropdown-toggle hide-arrow" id="email_more_2"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical" class="font-medium-2"></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="email_more_2">
                                        <div class="dropdown-item"><i data-feather="corner-up-left"
                                                class="me-50"></i>Reply</div>
                                        <div class="dropdown-item"><i data-feather="corner-up-right"
                                                class="me-50"></i>Forward</div>
                                        <div class="dropdown-item"><i data-feather="trash-2" class="me-50"></i>Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mail-message-wrapper pt-2">
                            <div class="mail-message">
                                <p class="card-text">Hey John,</p>
                                <p class="card-text">
                                    bah kivu decrete epanorthotic unnotched Argyroneta nonius veratrine preimaginary
                                    saunders demidolmen
                                    Chaldaic allusiveness lorriker unworshipping ribaldish tableman hendiadys outwrest
                                    unendeavored
                                    fulfillment scientifical Pianokoto Chelonia
                                </p>
                                <p class="card-text">
                                    Freudian sperate unchary hyperneurotic phlogiston duodecahedron unflown Paguridea catena
                                    disrelishable
                                    Stygian paleopsychology cantoris phosphoritic disconcord fruited inblow somewhatly
                                    ilioperoneal forrard
                                    palfrey Satyrinae outfreeman melebiose
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="mail-attachments">
                                <div class="d-flex align-items-center mb-1">
                                    <i data-feather="paperclip" class="font-medium-1 me-50"></i>
                                    <h5 class="fw-bolder text-body mb-0">2 Attachments</h5>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="mb-50">
                                        <img src="{{ asset('images/icons/doc.png') }}" class="me-25" alt="png"
                                            height="18" />
                                        <small class="text-muted fw-bolder">interdum.docx</small>
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('images/icons/jpg.png') }}" class="me-25" alt="png"
                                            height="18" />
                                        <small class="text-muted fw-bolder">image.png</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0">
                                    Click here to
                                    <a href="#">Reply</a>
                                    or
                                    <a href="#">Forward</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detailed Email Content ends -->
    </div>
    <!--/ Detailed Email View -->

    <!-- buat permintaan surat -->
    <div class="modal fade" id="buat_permohonan_surat" tabindex="-1" aria-labelledby="createAppTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-3 px-sm-3">
                    <h1 class="text-center mb-1" id="createAppTitle">Permintaan Pembuatan Surat</h1>
                    <p class="text-center mb-2">Provide application data with this form</p>

                    <div class="bs-stepper vertical wizard-modern create-app-wizard">
                        <div class="bs-stepper-header w-60" role="tablist">
                            <div class="step" data-target="#surat-keluar-eksternal" role="tab"
                                id="create-app-details-trigger">
                                <button type="button" class="step-trigger py-75">
                                    <span class="bs-stepper-box">
                                        <i data-feather="book" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Surat Keluar</span>
                                        <span class="bs-stepper-subtitle">Eksternal</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#surat-keluar-internal" role="tab"
                                id="create-app-frameworks-trigger">
                                <button type="button" class="step-trigger py-75">
                                    <span class="bs-stepper-box">
                                        <i data-feather="package" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Surat Keluar</span>
                                        <span class="bs-stepper-subtitle">Internal</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#berita-acara" role="tab"
                                id="create-app-database-trigger">
                                <button type="button" class="step-trigger py-75">
                                    <span class="bs-stepper-box">
                                        <i data-feather="command" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Berita Acara</span>
                                        <span class="bs-stepper-subtitle">Rapat</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#surat-tugas" role="tab"
                                id="create-app-billing-trigger">
                                <button type="button" class="step-trigger py-75">
                                    <span class="bs-stepper-box">
                                        <i data-feather="credit-card" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Surat Tugas</span>
                                        <span class="bs-stepper-subtitle">Pegawai/Guru</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#surat-keterangan" role="tab"
                                id="create-app-submit-trigger">
                                <button type="button" class="step-trigger py-75">
                                    <span class="bs-stepper-box">
                                        <i data-feather="check" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Surat Keterangan</span>
                                        <span class="bs-stepper-subtitle">Pegawai/Guru</span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- content -->
                        <div class="bs-stepper-content shadow-none p-2">
                            @include('content.permohonan_surat.surat_keluar_eks')
                            @include('content.permohonan_surat.surat_keluar_int')
                            @include('content.permohonan_surat.berita_acara')
                            @include('content.permohonan_surat.surat_tugas')
                            @include('content.permohonan_surat.surat_keterangan')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ buat permintaan surat -->
@endsection

@include('content.permohonan_surat.script', ['section' => 'vendor-script'])
@include('content.permohonan_surat.script', ['section' => 'page-script'])
