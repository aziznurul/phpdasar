import math

## Korelasi berat tanah (gamma_b) berdasarkan nilai SPT
def gammaB(kohesif, SPT):
    if (kohesif == False):
        if (SPT > 0 & SPT <= 10):
            gamma_b = 12 # 12 - 16
        elif (SPT >= 11 & SPT <= 30):
            gamma_b = 14 # 14 - 18
        elif (SPT >= 31 & SPT <= 50):
            gamma_b = 16 # 16 - 20
        else:
            gamma_b = 18 # 18 - 23

    else:
        if (SPT < 4):
            gamma_b = 14 # 14 - 18
        elif (SPT >= 4 & SPT < 6):
            gamma_b = 14 # 14 - 18
        elif (SPT >= 6 & SPT <= 15):
            gamma_b = 16 # 16 - 18
        elif (SPT >= 16 & SPT <= 25):
            gamma_b = 16 # 16 - 20
        else:
            gamma_b = 20 # >20
    
    return gamma_b

## Korelasi berat volumen tanah jenuh (gamma_sat) berdasarkan nilai SPT
def gammaSat(kohesif, SPT):
    if (kohesif == False):
        if (SPT > 3 & SPT <= 6):
            gamma_sat = 11 # 11 - 16
        elif (SPT >= 5 & SPT <= 9):
            gamma_sat = 14 # 14 - 18
        elif (SPT >= 10 & SPT <= 25):
            gamma_sat = 17 # 17 - 20
        elif (SPT >= 26 & SPT <= 45):
            gamma_sat = 17 # 17 - 22
        else:
            gamma_sat = 20 # 20 - 23

    else:
        if (SPT < 2):
            gamma_sat = 16 # 16 - 19
        elif (SPT >= 2 & SPT < 4):
            gamma_sat = 16 # 16 - 19
        elif (SPT >= 4 & SPT < 8):
            gamma_sat = 17 # 17 - 20
        elif (SPT >= 8 & SPT < 15):
            gamma_sat = 19 # 19 - 22
        elif (SPT >= 15 & SPT <= 30):
            gamma_sat = 19 # 19 - 22
        else:
            gamma_sat = 19 # 19 - 22
    
    return gamma_sat

#Input
z = 1   # kedalaman
M = 2   # kekuatan gempa

kohesif = True
SPT = 1
gamma_b = gammaB(kohesif, SPT)
gamma_sat = gammaSat(kohesif, SPT)  # berat volume tanah jenuh
gamma_w = 1     # berat volume air
H = 1   # kedalaman tanah

N_m = 1     # Nilai SPT di lapangan
C_E = 1     # faktor koreksi rasio tenaga palu
C_B = 1     # faktor koreksi diameter bor
C_R = 1     # faktor koreksi panjang batang SPT
C_S = 1     # faktor koreksi tabung sampel
C_N = 1     # faktor koreksi tegangan vertikal efektif

Pa = 1

a_max = 1   # Peak Ground Acceleration (PGA) maksimum
g = 1

FC = 1  # persentase butiran halus dengan ukuran < 0,075 mm.

w = 1   # tekanan overburden dengan fungsi kedalaman

## Perhitungan faktor reduksi tegangan (rd)
alpha = -1.012 - (1.126 * math.sin((z/11.73) + 5.133))
beta = 0.106 + (0.118 * math.sin((z/11.28) + 5.142))
rd = math.exp(alpha + (beta * M))

## Perhitungan tegangan vertikal total dan efektif
sigmavx = (gamma_sat - gamma_w ) * H
sigmav = gamma_sat * H

## Perhitungan Magnitude Scaling Factor
if M <= 1.8:
    MSF = 6.9 * math.exp(-M/4) - 0.058

## Perhitungan faktor koreksi overburden
N_1 = N_m * C_E * C_B * C_R * C_S * C_N     # Nilai SPT terkoreksi

Csigma = 1 /(18.9 - 2.55 * math.sqrt(N_1))

Ksigma = 1 - Csigma * math.log(sigmavx / Pa)

## Perhitungan Cyclic Shear Ratio
CSR = 0.65 * rd * (sigmav / sigmavx) * (a_max / g) * (1 / MSF) * (1 / Ksigma)

## Perhitungan Cyclic Resistance Ratio
deltaN1 = math.exp(1.63 + (9.7 / (FC + 0.01)) - ((9.7 / (FC + 0.01))** 2))
N_1_cs = N_1 + deltaN1  # ekuivalen dengan SPT pasir bersih (N1)60 untuk menghitung CRR

CRR = math.exp((N_1_cs / 14.1) + ((N_1_cs ** 2) / 14.1) - ((N_1_cs ** 3) / 23.6) + ((N_1_cs ** 4) / 25.4) - 2.8)

## Perhitungan Factor of Safety (FS)
FS = CRR / CSR

## Perhitungan potensi likuefaksi dengan fungsi kedalaman
if FS <= 1.411:
    P_L = 1 / (1 + ((FS / 0.96) ** 4.5))
elif FS > 1.411:
    P_L = 0

## Perhitungan Tingkat keparahan likuefaksi (LSI) 
LSI = P_L * w
