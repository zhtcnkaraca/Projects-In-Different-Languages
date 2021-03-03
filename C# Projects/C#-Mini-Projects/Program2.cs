using System;

namespace soruiki
{
    class Program
    {
        static void Main(string[] args)
        {
            //B(2) Grubu 2.Soru
            int toplam = 0;
            int[] cift={2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60};
            int[] tek= {1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59};

            for (int i = 0; i < 30; i++)
            {
                int a = 0;
                a= tek[i] * cift[i];
                toplam += a;
            }

            Console.WriteLine("Sonuç: {0}", toplam);
           
            Console.ReadKey();
        }
    }
}
