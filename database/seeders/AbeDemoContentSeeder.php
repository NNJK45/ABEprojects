<?php

namespace Database\Seeders;

use App\Models\Actualite;
use App\Models\Commentaire;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Programme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbeDemoContentSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function (): void {
            Image::query()->delete();
            Commentaire::query()->delete();
            Evenement::query()->delete();
            Actualite::query()->delete();
            Programme::query()->delete();

            $programmes = collect([
                'education' => ['Réussite éducative et orientation', 'Un accompagnement de proximité pour aider les enfants et les jeunes à consolider leurs apprentissages, préparer leur orientation et développer leur confiance. Le programme réunit ateliers de lecture, tutorat, mentorat et sensibilisation des familles.', 'programme-education.jpg'],
                'entrepreneuriat' => ['Entrepreneuriat féminin et jeunesse', 'Un parcours pratique pour transformer une idée en activité viable : clarification du projet, modèle économique, gestion simplifiée, communication digitale et mise en réseau. Une attention particulière est accordée aux femmes et aux jeunes porteurs de solutions locales.', 'programme-entrepreneuriat.jpg'],
                'sante' => ['Santé communautaire pour tous', 'Des actions accessibles de prévention et d’information sur la santé familiale, la nutrition, l’hygiène et le dépistage. Le programme rapproche les professionnels, les bénévoles et les communautés pour favoriser de bonnes pratiques au quotidien.', 'programme-sante.jpg'],
            ])->map(fn (array $data) => Programme::query()->create([
                'nom' => $data[0], 'description' => $data[1], 'image' => 'demo/abe/'.$data[2],
            ]));

            $events = collect([
                'mentorat' => ['entrepreneuriat', 'Rencontre mentorat : de l’idée au premier client', 'Une session interactive avec des entrepreneurs expérimentés pour structurer son offre, identifier ses premiers clients et repartir avec un plan d’action concret sur 30 jours.', 'Yaoundé — Centre-ville', '2026-10-17', 'evenement-mentorat.jpg'],
                'depistage' => ['sante', 'Journée santé et dépistage communautaire', 'Une journée d’écoute, de conseils et de contrôles préventifs : tension artérielle, glycémie, conseils nutritionnels et orientation vers les structures de santé partenaires.', 'Yaoundé — Mvog-Ada', '2026-11-07', 'evenement-depistage.jpg'],
                'atelier' => ['entrepreneuriat', 'Atelier pratique : gérer sa petite activité', 'Budget, prix de vente, suivi des dépenses et fidélisation : un atelier en petits groupes, illustré par des cas concrets adaptés aux micro-entreprises locales.', 'Yaoundé — Bastos', '2026-12-05', 'evenement-atelier.jpg'],
                'orientation' => ['education', 'Carrefour des métiers et de l’orientation', 'Collégiens, lycéens et parents rencontrent des professionnels, découvrent des parcours de formation et bénéficient de conseils pour construire un projet scolaire réaliste et motivant.', 'Yaoundé — Essos', '2027-02-13', 'evenement-rentree.jpg'],
            ])->map(fn (array $data) => Evenement::query()->create([
                'programme_id' => $programmes[$data[0]]->id, 'titre' => $data[1], 'description' => $data[2],
                'lieu' => $data[3], 'date' => $data[4], 'annee_event' => (int) substr($data[4], 0, 4),
                'image' => 'demo/abe/'.$data[5],
            ]));

            $news = collect([
                'femmes' => ['L’ABE ouvre les inscriptions au parcours entrepreneuriat féminin', 'Les inscriptions sont ouvertes pour notre prochain parcours destiné aux femmes qui souhaitent lancer ou consolider une activité génératrice de revenus. Les participantes travailleront leur proposition de valeur, leur budget, leur stratégie commerciale et leur présence numérique.', '2026-09-01', 'actualite-femmes.jpg'],
                'livres' => ['Une collecte de livres pour renforcer les espaces de lecture', 'L’Académie du Bien-Être mobilise bénévoles, familles et partenaires autour d’une collecte de livres scolaires, romans jeunesse et ouvrages pratiques pour équiper les ateliers de lecture.', '2026-08-24', 'actualite-livres.jpg'],
                'forum' => ['Retour sur notre forum bien-être, santé et autonomie', 'Professionnels de santé, éducateurs, entrepreneurs et acteurs communautaires ont partagé des solutions simples autour de la prévention, de l’autonomie économique et de l’éducation.', '2026-08-12', 'actualite-forum.jpg'],
                'benevoles' => ['De nouveaux bénévoles rejoignent les actions de proximité', 'Une nouvelle équipe de bénévoles a été accueillie et formée pour soutenir les ateliers éducatifs, les rencontres communautaires et l’orientation des bénéficiaires.', '2026-07-28', 'actualite-benevoles.jpg'],
            ])->map(fn (array $data) => Actualite::query()->create([
                'titre' => $data[0], 'contenu' => $data[1], 'date_publication' => $data[2], 'image' => 'demo/abe/'.$data[3],
            ]));

            $gallery = [
                [$events['mentorat']->id, null, 'galerie-formation.jpg'],
                [$events['atelier']->id, null, 'galerie-benevoles.jpg'],
                [$events['depistage']->id, null, 'galerie-consultation.jpg'],
                [$events['orientation']->id, null, 'galerie-ecole.jpg'],
                [null, $news['femmes']->id, 'galerie-communaute.jpg'],
                [null, $news['livres']->id, 'galerie-apprentissage.jpg'],
                [null, $news['forum']->id, 'galerie-bienetre.jpg'],
                [null, $news['benevoles']->id, 'galerie-solidarite.jpg'],
            ];

            foreach ($gallery as [$eventId, $newsId, $file]) {
                Image::query()->create(['url' => 'demo/abe/'.$file, 'evenement_id' => $eventId, 'actualite_id' => $newsId]);
            }
        });
    }
}
