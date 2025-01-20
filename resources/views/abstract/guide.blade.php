@extends('include.layout')

@section('content')
<div class="sub-tit-wrap">
    <h4 class="sub-tit">IMPORTANT DATES</h4>
</div>
<div class="date-wrap">
    <div class="date-conbox">
        <p>
            Deadline of abstract submission
            <strong>MARCH 31, 2025</strong>
        </p>
    </div>
    <div class="date-conbox">
        <p>
            Notice of acceptance
            <strong>APRIL 7, 2025</strong>
        </p>
    </div>
</div>
<div class="btn-wrap text-center">
    <a href="{{ route('abstract.registration', ['step'=>'1']) }}" class="btn btn-type1 color-type1">Abstract Submission</a>
</div>

<div class="sub-tit-wrap">
    <h4 class="sub-tit">TOPICS OF INTEREST</h4>
</div>
<div class="con-wrap">
    <ul class="list-type list-type-dot">
        <li>Protist diversity, biogeography, and speciation</li>
        <li>Protist evolution and development</li>
        <li>Endosymbiosis (plastid and mitochondria)</li>
        <li>Protist ecology</li>
        <li>Protist microscopy, cell biology, and physiology</li>
        <li>Protist genetics and biochemistry</li>
        <li>Parasites, symbiosis, and pathogenic protists</li>
    </ul>
    <ul class="list-type list-type-dot">
        <li>Bacteria and viruses in protists</li>
        <li>Photosynthetic eukaryotes</li>
        <li>Harmful protist</li>
        <li>Genomics, transcriptomics, and metagenomics</li>
        <li>Taxonomy and Diverse protist lineages of all protists</li>
        <li>Carbon capture and sequestration with algae</li>
    </ul>
</div>

<div class="sub-tit-wrap">
    <h4 class="sub-tit">SUBMISSION GUIDELINE</h4>
</div>
<ol class="list-type list-type-decimal">
    <li>All abstracts must be submitted via the Online System only.</li>
    <li>The abstract submitter must choose one topic from the category.</li>
    <li>All abstracts must be submitted in English only.</li>
    <li>Submitting an abstract does not automatically register you for to ICOP/ISOP 2025. Please ensure that all abstract presenters also complete the registration process.</li>
    <li>Authors are able to modify their abstracts until the submission deadline on the website.</li>
    <li>When you submit your abstract online, your abstract will be automatically edited according to ICOP/ISOP 2025 submission formats.</li>
    <li>It is the authors' responsibility to review the submissions and correct them. Submitters are responsible for all typing errors in the abstract.</li>
    <li>The submission form is intended for the review of the abstract.</li>
    <li>A confirmation letter of abstract submission will be automatically sent to the submitter and corresponding author by e-mail upon the completion of the online submission.</li>
</ol>
@endsection