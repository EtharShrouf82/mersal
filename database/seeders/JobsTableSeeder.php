<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobTranslations;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs=[
            [
                'title'=>' A Creative Graphic Designer is Needed ',
                'img'=>'2.webp',
                'description'=>'
                    AD Plus Advertising Agency is seeking for a talented and creative Graphic Designer.

                    The ideal candidate will have a strong portfolio demonstrating their experience in designing for prints and digital media, including social media, campaigns, and marketing materials.

                    RESPONSIBILITIES:

                    • Design visually compelling graphics and layouts for a variety of mediums, including digital and print
                    • Collaborate with team members to develop creative concepts and execute design solutions
                    • Stay up-to-date with the latest design trends and technologies
                    • Manage multiple projects and meet tight deadlines
                    • Study design briefs and determine requirements
                    • Conceptualize visuals based on requirements
                    • Develop illustrations, logos, and other designs using software or by hand
                    • Use the appropriate colors and layouts for each design
                    • Work with copywriters and other designers and creative director to produce the final design
                    • Amend designs after feedback
                ',
            ],
            [
                'title'=>'Social Media Specialist',
                'img'=>'1.png',
                'description'=>'
                We are seeking a creative and experienced Social Media Specialist to join our dynamic team at Trillionz Marketing Agency. As the Social Media Specialist, you will be responsible for developing and executing social media strategies that align with the company\'s overall marketing goals and objectives.

                    Duties and Responsibilities:

                Develop and execute social media strategies and campaigns that align with the company\'s overall marketing goals and objectives
                Manage and maintain the company\'s social media presence on various social media platforms, including but not limited to Facebook, Instagram, Twitter, and LinkedIn
                Create engaging and relevant content for social media platforms, including graphics, videos, and written content
                Monitor and analyze social media metrics and use data-driven insights to optimize social media performance and improve engagement with the company\'s target audience
                Stay  with social media trends, best practices, and technologies to identify new opportunities for growth and engagement
                Collaborate with the marketing team and other departments to ensure social media strategies align with the overall marketing strategy
                Communicate with followers, respond to inquiries, and manage social media interactions
                Manage social media advertising campaigns, including ad creation, targeting, and optimization
                Identify and engage with influencers and other industry leaders to increase the company\'s social media visibility and reputation
                                ',
            ],
        ];

        for ($i = 0; $i < count($jobs); $i++) {
            $cat = new Job();
            $cat->status = 1;
            $cat->img=$jobs[$i]['img'];
            $cat->end_date = '2023-05-21';
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            JobTranslations::create([
                'job_id' => $cat->id,
                'locale' => 'en',
                'title' => $jobs[$i]['title'],
                'description' => $jobs[$i]['description'],
            ]);
        }
    }
}
