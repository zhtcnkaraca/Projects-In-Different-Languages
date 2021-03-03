using System;

namespace sorubir
{
    class Program
    {
        static void Main(string[] args)
        {
            //B(2) Grubu 1.Soru
            double toplam =0;
            Console.WriteLine("Kaç metre küp su kullanıldı: ");
            int miktar = Convert.ToInt32(Console.ReadLine());

            if (miktar >= 100)
            {
                toplam += 80;
                if(miktar >400)
                {
                    toplam += 360;
                    if (miktar > 550)
                    {
                        toplam += 210;
                        if(miktar > 900)
                        {
                            toplam += 560;
                            if (miktar > 900)
                            {
                                miktar -= 900;
                                toplam += miktar * 2;
                            }
                        }
                        else
                        {
                            miktar -= 550;
                            toplam += miktar * 1.6;
                        }
                    }
                    else
                    {
                        miktar -= 400;
                        toplam += miktar * 1.4;
                    }
                }
                else
                {
                    miktar -= 100;
                    toplam += miktar * 1.2; 
                }
            }
            else
            {
                toplam = miktar * 0.8;
            }
            Console.WriteLine("Fiyat: {0}", toplam);

            Console.ReadKey();
        }
    }
}
