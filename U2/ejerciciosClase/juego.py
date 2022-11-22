import pygame
import os
import time

pygame.init()

screen = pygame.display.set_mode((400,400))

clock = pygame.time.Clock()

while True:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            pygame.quit()
            raise SystemExit


    screen.fill("aquamarine")

    pygame.display.flip()
    clock.tick(60)
    
    
