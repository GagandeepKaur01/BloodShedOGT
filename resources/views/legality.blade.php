@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')
<title>Privacy Policy: Bloodshed</title>
<style>
    .curved_div h1,
    .legality h2 {
        font-family: 'Audiowide', cursive;
        font-size: 40px !important;
        background: linear-gradient(to right bottom, #ffb900 20%, #ff7730 40%);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }


    body {
        background: #192231;
        color: white !important;
    }

    .legality {
        padding: 5% 0;
        text-align: justify;
    }

    .legality_main {
        padding: 0 40px;
    }

    .legality_main .heading {
        background: #333;
        padding: 5px 5px;

    }

    .curved_div {
        height: 60vh;
        background: url('../images/legality.jpg');
        background-size: cover;
        background-position: center center;
        background-color: rgba(0, 0, 0, 0.78);
        background-blend-mode: color;
        clip-path: polygon(0% 0%, 100% 0, 100% 70%, 50% 100%, 0 70%);
        position: relative;
    }

    .curved_div .centered-heading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>



<div class="curved_div">
    <h1 class="centered-heading">LEGALITY</h1>
</div>

<section class="con-a">
    <div class="container-fluid legality">
        <h2 class="head-f text-uppercase text-center">Legality</h2>

        <div class="legality_main">
            <div class="static-text-a">
                <p><strong><em><u>Skill vs. Chance </u></em></strong><u> </u></p>
                <p>Various courts in India have examined the difference between the game of skill and game of chance and in order to determine what constitutes gaming as defined in various state enactments (i.e.&nbsp;<em>gambling</em>); it is imperative to understand the difference between a "<strong>game of skill</strong>" and a "<strong>game of chance</strong>". </p>
                <p>Games of skill played for stakes in the physical form, do not come within the ambit of gaming (<em>as defined in various state enactments</em>); however to ascertain whether the same status is accorded to games of skill played online, it has to be seen whether there is a distinction between a game of skill and a game of chance. The expression '<strong>skill</strong>' has been defined by the Courts as an exercise upon known rules and fixed probabilities of sagacity, which involves five parameters:&nbsp;</p>
                <ul>
                    <li>learned or a developed ability, </li>
                    <li>strategy, </li>
                    <li>physical co-ordination, </li>
                    <li>technical expertise, and </li>
                    <li>knowledge </li>
                </ul>
                <p>On the other hand, “<strong>game of chance</strong>” was critically analysed by the Supreme Court of India in various case laws in the context of Rummy and other card games, stating that:</p>
                <p>“<em>The “<strong>chance</strong>” in Rummy is of the same character as the chance in a deal at a game of bridge. In fact, in all games in which cards are shuffled and dealt out, there is an element of chance, because the distribution of the cards is not according to any set pattern but is dependent upon how the cards find their place in the shuffled pack. From this alone it cannot be said that Rummy is a game of chance and there is no skill involved in it</em>.”</p>
                <p><strong><em><u>Gambling Laws in India</u></em></strong><u> </u></p>
                <p>At present gambling in India is regulated amongst others, by the Public Gambling Act ("<strong>Gambling Act</strong>") constituted in the year 1867, which extends to the United Provinces, East Punjab, Delhi and the Central Provinces and specifically prohibits public gambling and running or being in charge of a common gaming house.</p>
                <p>In addition to the aforesaid, the state legislators are,&nbsp;<em>vide</em>&nbsp;Entry No. 34 of List II (State List) of the Seventh Schedule of the Constitution of India, 1950 ("<strong>Constitution</strong>"), given exclusive power to make laws relating to betting and gambling. The applicability of the Gambling Act, for the purpose of any particular state stands repealed by virtue of the specific state enactment so promulgated in respect of the subject matter of betting and gambling, by virtue of the aforementioned provisions of the Constitution.</p>
                <p>At present the state legislature of Delhi has enacted the Delhi Public Gambling Act, 1955 ("<strong>Delhi Gambling Act</strong>") which prohibits gaming in the union territory of Delhi, but excludes from its purview the "games of mere skill" wherever played.</p>
                <p>In India, for a game to be considered as a game of skill, the mechanics (<em>nature of the game, mode of playing, rules etc.</em>) of the game should clearly reflect that the requirement of skill preponderates the element of chance and wherein success depends principally upon superior knowledge, training, attention, experience and adroitness of the player. In addition to which, it can be concluded that "games of skill" do not come within the purview of a majority of state gambling enactments, thereby meaning, that playing games of skill for stakes in the physical form, would not be treated as an act of gaming (<em>as defined in such enactments</em>).</p>
                <p><strong><em><u>Restrictions that may be applicable</u></em></strong><u> </u></p>
                <ul>
                    <li>Licensees cannot offer licensed games in other states where these games are categorised as gambling.</li>
                    <li>Brand names, trademarks or logos that are associated in any part of the world with gambling cannot be used for running games of skill.</li>
                    <li>Licensees must provide access to their dashboard to the licensing authority for supervision purposes.</li>
                    <li>Licensees can be required to set up an office in the state within 12 months from the date of issue of the licence.</li>
                    <li>Licensees can only offer the games specified in the licence, either on the physical premises of gaming parlours or through intranet gaming terminals within the state.</li>
                    <li>Gambling operators must maintain a website containing its credentials, number of licences and certain other key information.</li>
                    <li>Any advertising of online games must include the operator's website address containing the above information.</li>
                </ul>
                <p><strong><em><u>Anti-money laundering legislation</u></em></strong><u> </u></p>
                <p>The Public Gambling Act 1867 (Gambling Act) does not contain any express anti-money laundering provisions. However, the Prevention of Money Laundering Act 2002 applies to online gambling operators. Certain state gambling enactments also impose accounting and disclosure requirements.</p>
                <p><strong><em><u>Technical Measures</u></em></strong><u> </u></p>
                <p>The Public Gambling Act 1867 (Gambling Act) and the gambling state enactments do not prescribe technical measures to protect consumers from unlicensed operators. However, there are other laws that provide for technical measures to regulate unlicensed operators.<br>
                    The Payment and Settlement Systems Act 2007 regulates payments through pre-paid instruments, including e-wallets. When setting up payment systems for online gaming websites, online gaming operators must consider the category of pre-paid instruments that the wallet or account falls within. Certain payment systems require authorisation from the Reserve Bank of India.</p>
                <p>The Information Technology Act 2000 (IT Act) and the Information Technology (Intermediary Guidelines) Rules 2011 (IT Rules) require intermediaries (such as ISPs) to remove or block access to any content that is deemed unlawful, including content relating to or encouraging money laundering or gambling. An intermediary must take down unlawful content within 36 hours of obtaining knowledge of such content, either by itself or after being brought attention to it in writing by an affected person (IT Rules).</p>
                <p>An intermediary will be liable for any third-party unlawful content if it fails to take down this content expeditiously on acquiring actual notice, or on notification by the appropriate government agency, that any information, data or communication link residing in, or connected to, a computer resource controlled by the intermediary is being used to commit the unlawful act (IT Act). In the landmark judgment of <em>Shreya Singhal v Union of India</em>, the Supreme Court ruled that the provisions of the IT Act and the IT Rules must be interpreted to mean that the intermediary must receive a court order or notification from a government agency requiring the removal of specific information.</p>
                <p>Under the Foreign Exchange Management (Current Account Transaction) Rules 2000, the remittance abroad of income from winnings from lotteries, racing/riding or any other hobby is prohibited. Remittances abroad for the purchase of lottery tickets, football pools, sweepstakes and so on, is also prohibited. Although the rules do not expressly prohibit remittances for the purpose of casual/social gaming, these may be construed as prohibited under these rules.</p>
                <p><strong><em><u>Tax</u></em></strong><u> </u></p>
                <p>In the states of Sikkim and Nagaland, online gambling operators must pay royalties to the respective state governments.</p>
                <p>In a circular, the Central Board of Direct Taxes clarified that a person who maintains an e-wallet/virtual card account on a website hosted in a foreign country, and uses that account to play online games or poker, must assess and disclose their winnings to the tax authorities. The circular also clarifies that an e-wallet or virtual card account is similar to a bank account where inward and outward cash movements take place. Therefore, any winnings placed on these accounts must be disclosed.</p>
                <p><strong><em><u>Bloodshed – Legal Standing</u></em></strong><u> </u></p>
                <p>Bloodshed is an E-sports portal that hosts and manages online tournaments across various E-Sports titles. Bloodshed allow users to purchase Bloodshed Coin, their internal platform currency and allows them to take part in tournaments and send challenges to other players.<u></u></p>
                <p>The various Supreme Court rulings and the Gaming Acts of India imply the following:</p>
                <ul>
                    <li>Gaming or gambling means betting and wagering on games of chance. </li>
                    <li>Playing games of skill for cash does not constitute gambling. </li>
                    <li>Games of skill are exempt from the penal provisions of most gambling acts. </li>
                    <li>Video Games are games of skill. </li>
                </ul>
                <p>Bloodshed appropriately falls under the purview of the Game of Skill. However, States of Assam and Odisha have not been included in the domain as in these states the Gaming Laws are a little ambiguous and thus lies outside the purview Bloodshed services.</p>
                <p align="center">* * *</p>
            </div>

        </div>
    </div>
</section>


<script src="{{asset(url('JavaScript/login.js'))}}"></script>

@endsection

@section('footer')

@parent
@endsection